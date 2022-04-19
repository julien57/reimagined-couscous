<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use function Tinify\fromFile;
use function Tinify\setKey;

class FileUploader
{
    private $targetDirectory;
    private $slugger;
    private string $projectDir;

    public function __construct($targetDirectory, SluggerInterface $slugger, string $projectDir)
    {
        $this->targetDirectory = $targetDirectory;
        $this->slugger = $slugger;
        $this->projectDir = $projectDir;
    }

    public function upload(UploadedFile $file)
    {
        $extension = $file->guessExtension();
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            return false;
        }

        if ($extension !== 'pdf') {
            $filepath = $this->projectDir . '/public/uploads/' . $fileName;
            $this->optimizImage($filepath);
        }

        /*
         $factory = new OptimizerFactory();
        $optimizer = $factory->get();

        $filepath = $this->projectDir . '/public/uploads/' . $fileName;
        $optimizer->optimize($filepath);
         */


        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    /**
     * Use TinyPNG API - 500 compress max for free account
     *
     * @param string $filePath
     */
    private function optimizImage(string $filePath)
    {
        setKey('SsSM7qjp3g462Wh90xS1p8Kcyyjs8Ml8');
        fromFile($filePath)->toFile($filePath);
    }
}

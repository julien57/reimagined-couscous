<?php

namespace App\Service;

use ImageOptimizer\OptimizerFactory;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

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
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            return false;
        }

        $factory = new OptimizerFactory();
        $optimizer = $factory->get();

        $filepath = $this->projectDir . '/public/uploads/' . $fileName;
        $optimizer->optimize($filepath);

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}

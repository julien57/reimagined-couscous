<?php

namespace App\Command;

use App\Entity\Block;
use App\Entity\Module;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateModuleCommand extends Command
{
    protected static $defaultName = 'app:create-module';
    protected static $defaultDescription = 'Add a short description for your command';

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(string $name = null, EntityManagerInterface $em)
    {
        parent::__construct($name);
        $this->em = $em;
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $openStreetMapModue = new Module();
        $openStreetMapModue->setName('OpenStreetMap');
        $openStreetMapModue->setDescription('OpenStreetMap est un projet collaboratif visant à créer une base de données géographique modifiable gratuite du monde. Alternative gratuite de Google Maps.');
        $openStreetMapModue->setTemplateFolder('openstreetmap');

        $block1 = new Block();
        $block1->setName('OpenStreetMap - Texte gauche / Map droite');
        $block1->setPath('text_left_openstreetmap_right.html.twig');
        $block1->setType(5);
        $block1->setSubBlock(0);
        $block1->setModule($openStreetMapModue);
        $openStreetMapModue->addBlock($block1);
        $this->em->persist($block1);

        $block2 = new Block();
        $block2->setName('OpenStreetMap - Map gauche / Texte droite');
        $block2->setPath('openstreetmap_left_text_right.html.twig');
        $block2->setType(5);
        $block2->setSubBlock(0);
        $block2->setModule($openStreetMapModue);
        $openStreetMapModue->addBlock($block2);
        $this->em->persist($block2);

        $block3 = new Block();
        $block3->setName('OpenStreetMap - Map full largeur');
        $block3->setPath('openstreetmap_full_largeur.html.twig');
        $block3->setType(5);
        $block3->setSubBlock(0);
        $block3->setModule($openStreetMapModue);
        $openStreetMapModue->addBlock($block3);
        $this->em->persist($block3);

        $this->em->persist($openStreetMapModue);
        $this->em->flush();

        /*
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }
        */

        $io->success('Module OpenStreetMap ajouté');

        return Command::SUCCESS;
    }
}

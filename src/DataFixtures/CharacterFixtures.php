<?php

namespace App\DataFixtures;

use App\Entity\Character;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\UserFixtures;


class CharacterFixtures extends Fixture implements DependentFixtureInterface
{

    public function getDependencies()  
    {
        return [UserFixtures::class];  
    }

    Const CHARACTERS = [
        'Léodagan' => [
            'lastname' => '',
            'description' => 'Léodagan est le roi de Carmélide et l\'époux de Séli (avec qui il ne s\'entend pas). Têtu, impulsif, violent et sévère, il est aussi ministre et responsable de la justice et de l’armée bretonne et s\'évertue à vouloir bâtir des tourelles sur les plages de l\'île de Bretagne ',
            'picture' => 'https://www.tipux.com/files/gfx_m_pic/4476/1309_400x600.jpg',
            'power' => '40',
            ],
        'Perceval' => [
            'lastname' => 'de Galles',
            'description' => 'C\'est un chevalier médiocre, mais malgré les nombreuses critiques qu\'il reçoit pour sa stupidité, son ignorance et sa maladresse, Perceval possède une immense qualité, et pas des moindres : il est entièrement dévoué à Arthur, qu\'il admire et prend pour exemple. Pour lui, il n\'y qu\'un seul roi de Bretagne, et sa fidélité est sans faille !',
            'picture' => 'https://www.tipux.com/files/gfx_m_pic/a087/1308_400x600.jpg',
            'power' => '5',
            ],
        'Karadoc' => [
            'lastname' => 'de Vannes',
            'description' => 'Karadoc est loin d\'être un modèle de chevalier. Persuadé de détenir un savoir que les autres n\'ont pas, il s\'est fait un devoir d\'instruire son compagnon de toujours, Perceval, en lui dévoilant quotidiennement ce qu\'il nomme ses bottes secrètes, astuces qui selon lui permet de se faire passer pour quelqu\'un d\'intelligent et d\'indispensable. Karadoc est fidèle au roi et il lui arrive d\'avoir des lueurs d\'intelligence, comme lorsqu\'il discute avec Arthur de l\'échange d\'épouses.',
            'picture' => 'https://www.tipux.com/files/gfx_m_pic/8fb5/1443_400x600.jpg',
            'power' => '10',
            ],
        'Lancelot' => [
            'lastname' => 'du Lac',
            'description' => 'Lancelot est le fils du roi Ban de Benoïc. Il est le chevalier par excellence. Intelligent, loyal, courageux mais prétentieux, il est indéniablement le bras droit du roi Arthur. Cependant, son amour sans faille pour la reine Guenièvre le rend parfois fou de chagrin et de jalousie envers l\'homme qui est son meilleur ami et qu\'il respecte énormément. ',
            'picture' => 'https://www.tipux.com/files/gfx_m_pic/f938/1307_400x600.jpg',
            'power' => '50',
                        ],
        'Bohort' => [
            'lastname' => 'de Gaunes',
            'description' => 'Bohort est sans doute un des personnages les plus délicats et raffinés, et ne semble pas fait pour être chevalier, car bien qu\'il ait ce titre, il n\'a jamais suivi le cursus militaire. [3][4] Il est très peureux et avoue notamment avoir peur des animaux même les plus inoffensifs, comme les pigeons ou les lapins ',
            'picture' => 'https://www.tipux.com/files/gfx_m_pic/fd5c/1305_400x600.jpg',
            'power' => '15',
            ],
        'Yvain' => [
            'lastname' => '',
            'description' => 'Yvain, autoproclamé "Chevalier au Lion", est prince de Carmélide. C\'est le fils de Léodagan et de Séli ainsi qu\'un chevalier de la Table Ronde. Il est en outre le frère de la reine Guenièvre ainsi que l\'ami de Gauvain.',
            'picture' => 'https://www.tipux.com/files/gfx_m_pic/6f3e/1300_400x600.jpg',
            'power' => '20',
            ],
        'Gauvin' => [
            'lastname' => '',
            'description' => 'Gauvain est le fils du roi Loth et d\'Anna de Tintagel ainsi que le neveu d\'Arthur. Il fait partie des chevaliers de la table ronde. Il est également l\'ami d\'Yvain, lui aussi chevalier de la table ronde.',
            'picture' => 'https://www.tipux.com/files/gfx_m_pic/a083/1299_400x600.jpg',
            'power' => '25',
            ],
        'Calogrenant' => [
            'lastname' => '',
            'description' => 'Calogrenant est le roi du royaume de Calédonie et fait partie des Chevaliers de la Table Ronde.',
            'picture' => 'https://p0.storage.canalblog.com/09/17/486883/27784228.jpg',
            'power' => '30',
            ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CHARACTERS as $firstName => [ 'lastname' => $lastName , 'description' => $description , 'picture'=> $picture , 'power' => $power ] ){
            $character= new Character() ;

            $character->setFirstName($firstName);
            $character->setLastName($lastName);
            $character->setDescription($description);
            $character->setPicture($picture);
            $character->setPower($power);

            $manager->persist($character);
        }
        $manager->flush();
    }
}

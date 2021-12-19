<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'Administrator'],
            ['name' => 'Customer'],
        ]);

        User::insert([
            ['role_id' => 1, 
            'username' => 'admin', 
            'email_address' => 'admin@playshop.com', 
            'password' => bcrypt('admin'), 
            'address' => 'Playshop South Street 1', 
            'gender' => 'Female', 
            'birth_date' => '1988-01-01'],

            ['role_id' => 2, 
            'username' => 'budisentosa', 
            'email_address' => 'budisentosa@gmail.com', 
            'password' => bcrypt('budisentosa'), 
            'address' => 'Downtown Lane 21', 
            'gender' => 'Male', 
            'birth_date' => '1990-02-02'],

            ['role_id' => 2, 
            'username' => 'sarahfariha', 
            'email_address' => 'sarahfariha@gmail.com', 
            'password' => bcrypt('sarahfariha'), 
            'address' => 'Victoria 3rd Avenue', 
            'gender' => 'Female', 
            'birth_date' => '1992-03-03'],

            ['role_id' => 2, 
            'username' => 'ekosebastian', 
            'email_address' => 'ekosebastian@gmail.com', 
            'password' => bcrypt('ekosebastian'), 
            'address' => 'Rundown St. North 90A', 
            'gender' => 'Male', 
            'birth_date' => '1994-04-04'],

            ['role_id' => 2, 
            'username' => 'jayahartono', 
            'email_address' => 'jayahartono@gmail.com', 
            'password' => bcrypt('jayahartono'), 
            'address' => 'Memory Lane 11th Borough', 
            'gender' => 'Male', 
            'birth_date' => '1996-05-05'],
        ]);

        Genre::insert([
            ['name' => 'Shooters', 'image' => 'Shooters.jpg'],
            ['name' => 'Action RPG', 'image' => 'Action RPG.jpg'],
            ['name' => 'Horrors', 'image' => 'Horrors.jpg'],
            ['name' => 'Sports', 'image' => 'Sports.jpg'],
            ['name' => 'Simulators', 'image' => 'Simulators.jpg'],
        ]);

        Game::insert([
            // (1/5) 6 Shooters
            ['genre_id' => '1', 
            'name' => 'Battlefield 2042', 
            'price' => 85, 
            'description' => 'Battlefield™ 2042 is a first-person shooter that marks the return to the iconic all-out warfare of the franchise. In a near-future world transformed by disorder, adapt and overcome dynamically-changing battlegrounds with the help of your squad and a cutting-edge arsenal.', 
            'image' => 'Battlefield 2042.jpg'],

            ['genre_id' => '1', 
            'name' => 'Borderlands 3', 
            'price' => 80, 
            'description' => 'The original shooter-looter returns, packing bazillions of guns and a mayhem-fueled adventure! Blast through new worlds and enemies as one of four new Vault Hunters.', 
            'image' => 'Borderlands 3.jpg'],

            ['genre_id' => '1', 
            'name' => 'Doom Eternal', 
            'price' => 60, 
            'description' => 'Hells armies have invaded Earth. Become the Slayer in an epic single-player campaign to conquer demons across dimensions and stop the final destruction of humanity. The only thing they fear... is you.', 
            'image' => 'Doom Eternal.jpg'],

            ['genre_id' => '1', 
            'name' => 'PlayerUnknowns Battleground', 
            'price' => 65, 
            'description' => 'PUBG: BATTLEGROUNDS is a battle royale shooter that pits 100 players against each other in a struggle for survival. Gather supplies and outwit your opponents to become the last person standing.', 
            'image' => 'PlayerUnknowns Battleground.jpg'],

            ['genre_id' => '1', 
            'name' => 'Rust', 
            'price' => 75, 
            'description' => 'The only aim in Rust is to survive. Everything wants you to die - the islands wildlife and other inhabitants, the environment, other survivors. Do whatever it takes to last another night.', 
            'image' => 'Rust.jpg'],

            ['genre_id' => '1', 
            'name' => 'Tom Clancys Rainbow Six Siege', 
            'price' => 70, 
            'description' => 'Tom Clancys Rainbow Six Siege is the latest installment of the acclaimed first-person shooter franchise developed by the renowned Ubisoft Montreal studio.', 
            'image' => 'Tom Clancys Rainbow Six Siege.jpg'],

            // (2/5) 6 Action RPG
            ['genre_id' => '2', 
            'name' => 'Assassins Creed Origins', 
            'price' => 55, 
            'description' => 'ASSASSINS CREED® ORIGINS IS A NEW BEGINNING *The Discovery Tour by Assassins Creed®: Ancient Egypt is available now as a free update!* Ancient Egypt, a land of majesty and intrigue, is disappearing in a ruthless fight for power.', 
            'image' => 'Assassins Creed Origins.jpg'],

            ['genre_id' => '2', 
            'name' => 'DARK SOULS III', 
            'price' => 65, 
            'description' => 'Dark Souls continues to push the boundaries with the latest, ambitious chapter in the critically-acclaimed and genre-defining series. Prepare yourself and Embrace The Darkness!', 
            'image' => 'DARK SOULS III.jpg'],

            ['genre_id' => '2', 
            'name' => 'FINAL FANTASY XV', 
            'price' => 70, 
            'description' => 'Take the journey, now in ultimate quality. Boasting a wealth of bonus content and supporting ultra high-resolution graphical options and HDR 10, you can now enjoy the beautiful and carefully-crafted experience of FINAL FANTASY XV like never before.', 
            'image' => 'FINAL FANTASY XV.jpg'],

            ['genre_id' => '2', 
            'name' => 'Horizon Zero Dawn', 
            'price' => 65, 
            'description' => 'Experience Aloys legendary quest to unravel the mysteries of a future Earth ruled by Machines. Use devastating tactical attacks against your prey and explore a majestic open world in this award-winning action RPG!', 
            'image' => 'Horizon Zero Dawn.jpg'],

            ['genre_id' => '2', 
            'name' => 'Monster Hunter World', 
            'price' => 60, 
            'description' => 'Welcome to a new world! In Monster Hunter: World, the latest installment in the series, you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement.', 
            'image' => 'Monster Hunter World.jpg'],

            ['genre_id' => '2', 
            'name' => 'Warhammer Vermintide 2', 
            'price' => 50, 
            'description' => 'The critically acclaimed Vermintide 2 is a visually stunning and groundbreaking melee action game pushing the boundaries of the first person co-op genre. Join the fight now!', 
            'image' => 'Warhammer Vermintide 2.jpg'],

            // (3/5) 6 Horrors
            ['genre_id' => '3', 
            'name' => 'Alien Isolation', 
            'price' => 30, 
            'description' => 'Discover the true meaning of fear in Alien: Isolation, a survival horror set in an atmosphere of constant dread and mortal danger. Fifteen years after the events of Alien™, Ellen Ripleys daughter, Amanda enters a desperate battle for survival, on a mission to unravel the truth behind her mothers disappearance.', 
            'image' => 'Alien Isolation.jpg'],

            ['genre_id' => '3', 
            'name' => 'Resident Evil 3', 
            'price' => 35, 
            'description' => 'Jill Valentine is one of the last remaining people in Raccoon City to witness the atrocities Umbrella performed. To stop her, Umbrella unleashes their ultimate secret weapon: Nemesis! Also includes Resident Evil Resistance, a new 1 vs 4 online multiplayer game set in the Resident Evil universe.', 
            'image' => 'Resident Evil 3.jpg'],

            ['genre_id' => '3', 
            'name' => 'Resident Evil 7 Biohazard', 
            'price' => 40, 
            'description' => 'Fear and isolation seep through the walls of an abandoned southern farmhouse. "7" marks a new beginning for survival horror with the “Isolated View” of the visceral new first-person perspective.', 
            'image' => 'Resident Evil 7 Biohazard.jpg'],

            ['genre_id' => '3', 
            'name' => 'Resident Evil Village', 
            'price' => 50, 
            'description' => 'Experience survival horror like never before in the 8th major installment in the Resident Evil franchise - Resident Evil Village. With detailed graphics, intense first-person action and masterful storytelling, the terror has never felt more realistic.', 
            'image' => 'Resident Evil Village.jpg'],

            ['genre_id' => '3', 
            'name' => 'SOMA', 
            'price' => 45, 
            'description' => 'From the creators of Amnesia: The Dark Descent comes SOMA, a sci-fi horror game set below the waves of the Atlantic ocean. Struggle to survive a hostile world that will make you question your very existence.', 
            'image' => 'SOMA.jpg'],

            ['genre_id' => '3', 
            'name' => 'The Evil Within 2', 
            'price' => 55, 
            'description' => 'Detective Sebastian Castellanos has lost everything, including his daughter, Lily. To save her, he must descend into the nightmarish world of STEM. Horrifying threats emerge from every corner, and he must rely on his wits to survive. For his one chance at redemption, the only way out is in.', 
            'image' => 'The Evil Within 2.jpg'],

            // (4/5) 6 Sports
            ['genre_id' => '4', 
            'name' => 'Assetto Corsa', 
            'price' => 95, 
            'description' => 'Assetto Corsa v1.16 introduces the new "Laguna Seca" laser-scanned track, 7 new cars among which the eagerly awaited Alfa Romeo Giulia Quadrifoglio! Check the changelog for further info!', 
            'image' => 'Assetto Corsa.jpg'],

            ['genre_id' => '4', 
            'name' => 'F1 2021', 
            'price' => 85, 
            'description' => 'Every story has a beginning in F1® 2021, the official videogame of the 2021 FIA FORMULA ONE WORLD CHAMPIONSHIP™. Enjoy the stunning new features of F1® 2021, including the thrilling story experience Braking Point, two-player Career, and get even closer to the grid with Real-Season Start.', 
            'image' => 'F1 2021.jpg'],

            ['genre_id' => '4', 
            'name' => 'FIFA 22', 
            'price' => 70, 
            'description' => 'Play FIFA 22, Get a Next Generation Player Item: receive an untradeable Next Generation Player Item in FIFA Ultimate Team starting December 15 when you play FIFA 22 by January 14, 2022*.', 
            'image' => 'FIFA 22.jpg'],

            ['genre_id' => '4', 
            'name' => 'Gran Turismo Sport', 
            'price' => 75, 
            'description' => 'The ultimate Gran Turismo has finally been realized. With next-gen photorealistic graphics that push the PlayStation®4 to its limits, this latest installment delivers a rich driving-simulation experience to all kinds of players. You can now enjoy “Scapes,” a new photo mode that challenges the world of photography at a fundamental level, and “Sports Mode,” which through a partnership with the FIA (Federation Internationale de Automobile) gives players the thrill of viewing world championship events.', 
            'image' => 'Gran Turismo Sport.jpg'],

            ['genre_id' => '4', 
            'name' => 'Madden NFL 22', 
            'price' => 90, 
            'description' => 'Madden NFL 22 is where gameday happens. All-new features in Franchise include staff management, an enhanced scenario engine, and weekly strategy. Share avatar progress and player class between Face of The Franchise and The Yard with unified progression.', 
            'image' => 'Madden NFL 22.jpg'],

            ['genre_id' => '4', 
            'name' => 'NBA 2K22', 
            'price' => 80, 
            'description' => 'NBA 2K22 puts the entire basketball universe in your hands. Anyone, anywhere can hoop in NBA 2K22.', 
            'image' => 'NBA 2K22.jpg'],

            // (5/5) 6 Simulators

            ['genre_id' => '5', 
            'name' => 'Cities Skylines', 
            'price' => 65, 
            'description' => 'Cities: Skylines is a modern take on the classic city simulation. The game introduces new game play elements to realize the thrill and hardships of creating and maintaining a real city whilst expanding on some well-established tropes of the city building experience.', 
            'image' => 'Cities Skylines.jpg'],

            ['genre_id' => '5', 
            'name' => 'Farming Simulator 22', 
            'price' => 45, 
            'description' => 'Create your farm and let the good times grow! Harvest crops, tend to animals, manage productions, and take on seasonal challenges.', 
            'image' => 'Farming Simulator 22.jpg'],

            ['genre_id' => '5', 
            'name' => 'Job Simulator', 
            'price' => 50, 
            'description' => 'In a world where robots have replaced all human jobs, step into the "Job Simulator" to learn what it was like to job.', 
            'image' => 'Job Simulator.jpg'],

            ['genre_id' => '5', 
            'name' => 'Planet Coaster', 
            'price' => 55, 
            'description' => 'Planet Coaster® - the future of coaster park simulation games has arrived! Surprise, delight and thrill incredible crowds as you build your coaster park empire - let your imagination run wild, and share your success with the world.', 
            'image' => 'Planet Coaster.jpg'],

            ['genre_id' => '5', 
            'name' => 'Railway Empire', 
            'price' => 25, 
            'description' => 'In Railway Empire, you will create an elaborate and wide-ranging rail network, purchase over 40 different trains modelled in extraordinary detail, and buy or build railway stations, maintenance buildings, factories and tourist attractions to keep your travel network ahead of the competition.', 
            'image' => 'Railway Empire.jpg'],

            ['genre_id' => '5', 
            'name' => 'The Sims 4', 
            'price' => 60, 
            'description' => 'Play with life and discover the possibilities. Unleash your imagination and create a world of Sims thats wholly unique. Explore and customize every detail from Sims to homes and much more.', 
            'image' => 'The Sims 4.jpg'],

        ]);
    }
}

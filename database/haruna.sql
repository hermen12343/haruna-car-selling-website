-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 08:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haruna`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcars_for_sale`
--

CREATE TABLE `tblcars_for_sale` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `mileage` int(50) NOT NULL,
  `years` int(20) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `variant` varchar(100) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `seats` int(20) NOT NULL,
  `engine_cc` int(50) NOT NULL,
  `horsepower` int(50) NOT NULL,
  `peak_torque` int(11) NOT NULL,
  `engine_type` varchar(100) NOT NULL,
  `length` int(20) NOT NULL,
  `width` int(20) NOT NULL,
  `height` int(20) NOT NULL,
  `wheel_base` int(20) NOT NULL,
  `kerb_weight` int(20) NOT NULL,
  `fuel_tank` int(20) NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(500) NOT NULL,
  `interior_image` varchar(500) NOT NULL,
  `exterior_image` varchar(500) NOT NULL,
  `car_service_report` varchar(500) NOT NULL,
  `ccondition` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcars_for_sale`
--

INSERT INTO `tblcars_for_sale` (`car_id`, `car_name`, `location`, `price`, `mileage`, `years`, `brand`, `model`, `variant`, `transmission`, `type`, `seats`, `engine_cc`, `horsepower`, `peak_torque`, `engine_type`, `length`, `width`, `height`, `wheel_base`, `kerb_weight`, `fuel_tank`, `description`, `cover_image`, `interior_image`, `exterior_image`, `car_service_report`, `ccondition`, `user_id`) VALUES
(1, 'BMW M3', 'West Malaysia', '400000', 0, 2023, 'BMW', 'M3', 'kutkutlatlat', 'Auto', 'Sedan', 4, 3000, 546, 700, 'Inline 6', 2045, 456, 123, 1234, 2455, 100, 'New BMW M3 CS gets more power, less weight and all-wheel drive. Utilising the mechanical and lightweight carbonfibre components of the M4 CSL, the M3 CS has the same 542 horsepower to play with as the CSL. That equates to a power increase of 88 hp over the previous 2018 M3 CS, and 39 hp more than the current gen M3 Competition. Whilst torque remains unchanged at 479 lb-ft, the CS will launch from 0 to 62 mph in just 3.4 seconds and 124 mph in 11.1 seconds whilst going on to a top speed of 188 mph.', 'ad2.jpg', 'ad3.jpg', 'ad4.jpg', 'got service', 'New', 2),
(2, 'Mercedes-Maybach EQS', 'West Malaysia', '798888', 0, 2024, 'Mercedes', 'EQS', '', 'Auto', 'SUV', 5, 5980, 0, 0, '', 1720, 1890, 4700, 0, 0, 0, 'Mercedes flagship Maybach brand is previewing it’s first electric car in the form of the EQS SUV concept. The near silent electric motors are usually a good fit for luxury vehicles, a class Maybach’s certainly have made an impression in over the years.\r\n\r\nFollowing Mercedes other EQ cars, the Maybach EQS has a curvy design with a tall front grille featuring cascading chrome lines that are mirrored in the air inlet below it. The side windows make use of a chrome surround with a prominent b-pillar treatment and the body has been finished in a signature two-tone paint scheme.', 'car1.jpg', 'car1-1.jpg', 'car1-2.jpg', '', 'New', 1),
(3, 'Nissan Sport', 'East Malaysia', '100000', 0, 2014, 'Nissan', 'Sport', 'Sedan', 'Auto', 'Sedan', 5, 4000, 0, 0, 'V6', 4551, 1802, 1408, 0, 0, 0, 'The Nissan Sport Sedan Concept, a design study with a particular emphasis on next-generation design and sporty style, was created to embody the essence of a true sports sedan – that rare execution of 4-door sedan with the aura of a real sports car. It previews a future production vehicle intended for owners with a passion for cutting-edge design and driving dynamics.\r\n\r\n“The Sport Sedan Concept shows a new, highly emotional and energetic design direction that takes Nissan’s legendary approach of applying sports car principles to a sedan to the next level,” said Nissan Senior Vice President and Chief Creative Officer Shiro Nakamura. “The Sport Sedan Concept captures that essence with bold and exciting sports car design and proportions.”', 'car2.jpg', 'car2-1.jpg', 'car2-2.jpg', '', 'New', 1),
(4, 'Toyota Tacoma', 'West Malaysia', '185200', 0, 2016, 'Toyota', 'Tacoma', '', 'Auto', 'Truck', 5, 4000, 278, 359, 'V6', 0, 0, 0, 0, 0, 0, 'Toyota is celebrating October 21, 2015 – the futuristic date first introduced in Back to the Future Part II – with a re-creation of Marty McFly’s dream truck. Using the all-new 2016 Toyota Tacoma that went on sale in September, fans in Los Angeles, New York and Dallas can see the truck in major tourist destinations for today only.\r\n\r\nTo make the 2016 Tacoma look like a modern-day version of the classic from the movie, a number of modifications were made; custom 1985 Toyota truck exterior paint, off-road suspension, Toyota Racing Development(TRD) wheels with BFGoodrich tires. custom front and rear tubular bumpers, custom light bar, custom “D-4S” fuel injection badging, custom tailgate with iconic “TOYOTA” logo, custom vintage headlight and taillight design and mud flaps.', 'car3.jpg', 'car3-1.jpg', 'car3-2.jpg', '', 'New', 1),
(5, 'Porsche Panamera 4S E-Hybrid', 'East Malaysia', '1300000', 0, 2021, 'Porsche', 'Panamera 4S E-Hybrid', '', 'Auto', 'Hybrid', 2, 2900, 552, 750, 'V6 Twin Turbo Hybrid', 3000, 1945, 1455, 2998, 0, 0, 'The new Porsche Panamera combines the 4S and the E-Hybrid models to create the second most powerful Panamera in the range. Featuring a new 2.9L twin turbocharged V6 engine that develops 450 PS (331 kW) of power, the hybrid part comes in the form of a 136 PS (100 kW) electric motor integrated into the eight-speed dual-clutch PDK transmission. A bigger 17.9 kWh battery now powers that electric motor and can provide an all-electric range of 33 miles on the WLTP cycle.', 'car4.jpg', 'car4-1.jpg', 'car4-2.jpg', '', 'New', 1),
(6, 'Honda Urban EV', 'West Malaysia', '138000', 0, 2017, 'Honda', 'Urban EV', '', 'Auto', 'EV', 5, 0, 0, 0, 'Electric', 0, 0, 0, 0, 0, 0, 'Honda have revealed a retro inspired design for their new electric concept car that will set the tone for their future electric production models. Reminiscent of a classic Mini, the Urban EV concept showcases advanced technology within a simple and sophisticated design. It has a low and wide stance, with big wheels and short overhangs, making it a rather good looking car.\r\n\r\nFeatured on the front of the car is a digital screen set between the headlights that can display interactive multilingual messages, including greetings, advice for other drivers on the road, or charging status updates. The interior is dominated by a simple dash layout with a very long LCD screen that stretches nearly the entire width of the dash. This panoramic screen will show all the usual information and likely house various controls with the only physical buttons remaining limited to a couple dials.', 'car5.jpg', 'car5-1.jpg', 'car5-2.jpg', '', 'New', 1),
(7, 'Audi RS3', 'West Malaysia', '646990', 0, 2023, 'Audi', 'RS3 Performance', '', 'Auto', 'Sedan', 5, 3000, 395, 500, 'Inline 5 Turbo', 4524, 1851, 1436, 0, 0, 0, 'Audi Sport have just unveiled the limited-run RS3 Performance Edition, featuring a little more power and chassis tweaks. With a little turning up of the turbochargers boost pressure, the 2.5L inline five-cylinder engine now produces juts 7 hp more than before at 401 hp. Torque has remined the same at 369 lb-ft but now hangs around a bit longer ion the rev range. All up, this is Audi’s most powerful five-cylinder production car yet.\r\n\r\nProduction will be limited to 300 units split between the hatch and sedan body styles.', 'car6.jpg', 'car6-1.jpg', 'car6-2.jpg', '', 'New', 1),
(8, 'BMW M4 GTS', 'West Malaysia', '751800', 800, 2015, 'BMW', 'M4 GTS', '', 'Auto', 'Sedan', 5, 3000, 0, 0, 'Inline 6 Twin Turbo', 0, 0, 0, 0, 0, 0, 'A year on from the launch of the BMW M4 Coupe, BMW M GmbH presented an initial preview of a high-performance model for use on the road and on the race track: the BMW Concept M4 GTS – the first M3/M4 special production vehicle to be sold in the US.\r\n\r\nThe BMW M GmbH was founded in 1972 as BMW Motorsport GmbH and caused a sensation with its iconic BMW M1 racing car. As the force behind the world’s most successful racing touring car, the Group A BMW M3 and the development of the first turbocharged engine to win the Formula One World Championship, the BMW M GmbH return to its racing roots with the BMW Concept M4 GTS.', 'car7.jpg', 'car7-1.jpg', 'car7-2.jpg', '', 'Used', 2),
(9, 'Ford Evos', 'East Malaysia', '185000', 4000, 2012, 'Ford', 'Evos', '', 'Auto', 'Sedan', 2, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 'Making its global debut at the 2011 Frankfurt Motor Show in September, the Ford Evos Concept represents the ultimate expression of Ford’s new global design language, and explores key future powertrain and vehicle technologies.\r\n\r\nCreated as a bespoke concept vehicle, the fastback introduces Ford’s first truly global design language as the momentum of the company’s One Ford product plan continues to build.', 'car8.jpg', 'car8-1.jpg', 'car8-2.jpg', '', 'Used', 1),
(10, 'Ferrari 488 GTB', 'West Malaysia', '1030000', 500, 2016, 'Ferrari', '488 GTB', '', 'Auto', '', 2, 4000, 660, 760, 'V8 Twin Turbo', 0, 0, 0, 0, 1370, 0, '40 years after the Ferrari 308 GTB was unveiled as the first mid-rear-engined V8 model in the companies history comes the new turbocharged Ferrari 488 GTB. Replacing the beautiful Ferrari 458 Italia, the 488 sets new heights with class topping power levels from the new 3.9L twin turbocharged V8. Peak power is rated at 670 PS (492 kW) at 8,000 rpm, with 560 lb-ft (760 Nm) of torque available form 2,000 rpm. This equals a huge increase of 100 PS and 162 lb-ft over the naturally aspirated 4.5L V8 from the 458 Italia.\r\n\r\nPerformance gains for the Ferrari 488 GTB are significant with the 0-100 kph sprint done and dusted in just 3.0 seconds and 0-200 kph is over in only 8.3 seconds. The lap time at Ferrari’s Fiorano test track was clocked at 1 minute 23 seconds, which is 1.9 seconds faster than the Ferrari Enzo and 2.0 seconds faster than the Ferrari 458.', 'car9.jpg', 'car9-1.jpg', 'car9-2.jpg', '', 'Used', 2),
(11, 'Honda Civic Type R', 'East Malaysia', '399900', 0, 2023, 'Honda', 'Civic Type R', '', 'Manual', 'Sedan', 4, 2000, 315, 420, 'Inline 4 Turbo', 0, 0, 0, 0, 0, 0, 'New Honda Civic Type R has been revealed as the most powerful Honda Civic to date. Gone are the boy-racer looks of the past generation with Honda opting for a more mature style signalling that the Civic Type R has grown-up in it’s 30th anniversary. The usual big rear wing has been kept and the triple exhaust tip arrangement has also made the leap over, but the rest is much more toned down and simple. For the most part, I think it is rather successful in moving the Type R to a broader market appeal.\r\n\r\nHonda are keeping quiet about specs at this point in time, but are promising more power than the 315 hp of the previous Type R. That will make this the most powerful Honda ever sold in the US as the 600 hp NSX was only sold as an Acura in that market.', 'car10.jpg', 'car10-1.jpg', 'car10-2.jpg', '', 'New', 1),
(12, 'Toyota Tundra', 'East Malaysia', '296920', 0, 2022, 'Toyota', 'Tundra', '', 'Auto', 'Hybrid', 5, 3000, 437, 790, 'V6 Twin Turbo Hybrid', 0, 0, 0, 0, 0, 0, 'The new Toyota Tundra has arrived with a modern look and hybrid powertrain option. This is an entirely new 3rd generation Tundra which replaces the previous model that was first released back in 2007. It shares the same global platform as the mighty Land Cruiser and will be available in two wheelbases in either double max or crew cab configurations.\r\n\r\nFor the TRD Pro model a hybrid powertrain will be on offer that comprises of a 3.4L twin turbocharged V6 engine and an electric motor that is sandwiched between the engine and the 10-speed transmission’s torque converter. This setup pumps out 437 hp and 583 lb-ft of torque with the electric motor fed by a nickel-metal hydride (NiMH) battery pack placed under the rear seats. There is an EV only mode for driving but speed is limited to 18 mph, and the range will likely be very limited.', 'car11.jpg', 'car11-1.jpg', 'car11-2.jpg', '', 'New', 2),
(13, 'Nissan Navara PRO-4X Warrior', 'East Malaysia', '154800', 7000, 2021, 'Nissan', 'Navara PRO-4X Warrior', '', 'Manual', 'Truck', 5, 2000, 188, 450, 'Inline 4 Twin Turbo', 0, 0, 0, 0, 0, 0, 'Taking the fight to the Ford Ranger Raptor, the Navara PRO-4X Warrior is an Australian exclusive pickup and Nissan’s new hero car for the sector. With ute (truck) sales still going strong in Australia, Nissan is looking to better capture the modified off-roaders market after their initial entry with the Navara N-Trek.\r\n\r\nThe Warrior will be built in conjunction with Premcar, a local company who are converting the top range Navara PRO-4X into the Warrior spec. The changes made includes a 30mm wider track, completely new bespoke suspension, 40mm higher ride height, unique 17-inch wheels, an increased 36 degrees approach angle and 600mm wading depth. The 2.3L turbo diesel engine remains untouched, which means 188 hp and 332 lb-ft of torque and a 961 kilograms of load carrying capacity.\r\n\r\n', 'car12.jpg', 'car12-1.jpg', 'car12-2.jpg', '', 'Used', 1),
(14, 'Porsche Taycan Turbo', 'West Malaysia', '575000', 7532, 2020, 'Porsche', 'Taycan Turbo', '', 'Auto', 'EV', 2, 0, 751, 1049, '2x Electric', 0, 0, 0, 0, 2295, 0, 'The Porsche Taycan has arrived, the brands first fully electric car that produces 750 horsepower and looks as good as the Mission E concept it’s based from. The Taycan family is set to be expanded over the next few years, with Porsche launching the car with 2 high-spec variants first. Called the Taycan Turbo and Turbo S, the naming is meant to align the models with the rest if the Porsche fleet despite no turbochargers present on the Taycan.\r\n\r\nThis is an all-wheel drive fully electric powered sports car that utilises two electric motors that combine for a peak power output of 761 PS (560 kW) and 774 lb-ft (1,049 Nm) of torque in overboost mode. Outisde of the overboost mode, the Taycan makes do the 625 PS (459 kW). When launch control is active, the Taycan will accelerate from 0-62 mph in 2.8 seconds, 0-100 mph in 6.3 seconds an onwards to a limited top speed of 162 mph. Porsche has fitted a 93.4 kWh bespoke lithium battery pack that is located under the floor, helping achieve a WLTP range of up to 450 kilometres for the Turbo, and 412 for the Turbo S.', 'car13.jpg', 'car13-1.jpg', 'car13-2.jpg', '', 'Used', 2),
(15, 'Mercedes-Benz GLC63 S AMG', 'West Malaysia', '912283', 0, 2018, 'Mercedes', 'GLC63 S AMG', '', 'Auto', 'SUV', 5, 4000, 510, 700, 'V8 Twin Turbo', 0, 0, 0, 0, 0, 0, 'The Mercedes GLC has been given the AMG treatment, stuffing a big 500+ hp V8 under the hood in both SUV and coupe variants. The GLC63 has a combination of parts from the C63 and E63 AMGs, which should provide a road munching performance car set to take on the luxury SUV segment.\r\n\r\nPower is feed through a nine-speed multi-clutch transmission borrowed from the E63 AMG. To put it to the ground an all-wheel drive system that offers fully variable torque distribution between the front and rear axles should keep the GLC63 planted on the road. There are different ride characteristics the driver can select with three-chamber air suspension allowing a range of comfort to sport.', 'car14.jpg', 'car14-1.jpg', 'car14-2.jpg', '', 'New', 1),
(16, 'Tesla Model 3', 'West Malaysia', '199000', 0, 2018, 'Tesla', 'Model 3', '', 'Auto', 'EV', 5, 0, 456, 639, '2x Electric', 0, 0, 0, 0, 1847, 0, 'The Tesla Model 3 stands as the brands push to bring the affordable electric car to the masses, with good range, great power and sharp looks. The production troubles have been well covered, but as Tesla learns how to produce cars on a large scale, their competitors have been gathering their forces and are poised to enter the market with some stiff competition.\r\n\r\nThe wait was a long one for Tesla to bring an affordable car to the market. They started with the Roadster, a proof of concept that electric cars could be both fast and fun. Next was the Model S, a large luxury sedan that made was good looking and very capable, and through several software and battery upgrades was able to achieve supercar beating acceleration. Next along was the Model X, the luxury SUV that shared a lot of the good stuff from the S. Finally the Tesla Model 3, a medium sized sedan starting at much more affordable prices that is set to take the company into mass market adoption.', 'car15.jpg', 'car15-1.jpg', 'car15-2.jpg', '', 'New', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(50) NOT NULL,
  `username` text NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `username`, `mobile_number`, `email_address`, `password`) VALUES
(1, 'Ian', '01162575151', 'ianlim575@gmail.com', '1234'),
(2, 'Hermen', '0123252589', 'hermen@gmail.com', '1234'),
(3, 'Daniel', '0145393427', 'daniel@gmail.com', 'daniel'),
(4, 'Chan', '0153647588', 'chan@gmail.com', '1234'),
(5, 'Ethan', '0134983948', 'ethan@gmail.com', '2356'),
(6, 'John', '0123252589', 'john@gmail.com', '53456'),
(7, 'Wong', '0123534647', 'wong@gmail.com', '4253'),
(8, 'Jen', '0158936758', 'jen@gmail.com', '6585'),
(9, 'Sean', '0124953968', 'sean@gmail.com', '2456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcars_for_sale`
--
ALTER TABLE `tblcars_for_sale`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcars_for_sale`
--
ALTER TABLE `tblcars_for_sale`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcars_for_sale`
--
ALTER TABLE `tblcars_for_sale`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `tblusers` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 12:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `selector`
--

CREATE TABLE `selector` (
  `name` varchar(300) NOT NULL,
  `symptom` varchar(300) NOT NULL,
  `suggestion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selector`
--

INSERT INTO `selector` (`name`, `symptom`, `suggestion`) VALUES
('head', 'Facial pain', 'Dental Issues: Dental conditions such as tooth abscess, cavities, gum disease, or dental trauma can cause localized facial pain around the affected area.'),
('head', 'Headache', 'Take a break and rest in a quiet environment.\r\nApply a cold or warm compress to the affected area.\r\nConsider taking over-the-counter pain relief medication, following proper dosage instructions.'),
('head', 'Dizziness', 'Sit or lie down in a comfortable position until the dizziness subsides.\r\nAvoid sudden movements and slowly change positions.\r\nStay hydrated and maintain a balanced diet., following proper dosage instructions.'),
('head', 'Sinus congestion', 'Use a saline nasal spray or rinse to alleviate congestion.\r\nApply a warm compress over the sinus areas.\r\nStay hydrated and drink plenty of fluids to thin mucus secretions.'),
('chest', 'Chest pain', 'If experiencing severe or persistent chest pain, seek immediate medical attention.\r\nRelax and take slow, deep breaths.\r\nAvoid strenuous activities and physical exertion until the cause of the pain is determined.'),
('chest', 'Shortness of breath', 'Sit in an upright position and focus on breathing slowly.\r\nIf symptoms worsen, seek medical assistance.\r\nAvoid exposure to triggers such as allergens or pollutants.'),
('chest', 'Heartburn', 'Avoid large, fatty meals and spicy foods.\r\nEat smaller, more frequent meals.\r\nTry over-the-counter antacids or consult a healthcare professional for appropriate medication.'),
('stomach', 'Abdominal pain', 'Rest and apply a heating pad to the affected area.\r\nAvoid consuming large meals and opt for lighter, easily digestible foods.\r\nStay hydrated and drink plenty of fluids.'),
('stomach', 'Nausea', 'Sip on clear fluids such as water, ginger ale, or herbal teas.\r\nAvoid strong odors and foods that may trigger nausea.\r\nTry eating small, frequent meals instead of large ones.'),
('stomach', 'Bloating', 'Avoid gas-producing foods such as beans, lentils, cabbage, and carbonated drinks.\r\nEngage in light physical activity such as walking to aid digestion.\r\nConsider over-the-counter medications designed to alleviate bloating symptoms.'),
('leg', 'Leg pain', 'Rest the affected leg and elevate it to reduce swelling.\r\nApply a cold compress or ice pack to the area for short periods.\r\nIf the pain persists or worsens, consult a healthcare professional.'),
('leg', 'Muscle cramps', 'Gently stretch and massage the affected muscle.\r\nApply a warm compress to relax the muscle.\r\nEnsure you are properly hydrated and consider electrolyte replenishment.'),
('leg', 'Swelling', 'Elevate the affected leg to reduce swelling.\r\nApply a cold compress to the swollen area.\r\nAvoid standing or sitting for prolonged periods and engage in regular movement.');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `symptom` varchar(500) DEFAULT NULL,
  `suggestion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`symptom`, `suggestion`) VALUES
('headache', 'Take a pain reliever like ibuprofen.'),
('headache', 'Apply a cold or warm compress to your forehead.'),
('cough', 'Drink warm fluids like tea or soup to soothe your throat.'),
('cough', 'Use cough drops or lozenges to relieve coughing.'),
('fever', 'Take acetaminophen to reduce fever.'),
('fever', 'Get plenty of rest and stay hydrated.'),
('fever', 'Rest and avoid exerting yourself until the fever subsides.'),
('stomachache', 'Avoid foods that are spicy, greasy, or high in fiber.'),
('stomachache', 'Try drinking ginger tea or taking ginger supplements to relieve the stomachache.'),
('stomachache', 'Use a heating pad or take a warm bath to relax your abdominal muscles.'),
('sore throat', 'Gargle with warm saltwater to soothe your throat.'),
('sore throat', 'Drink warm liquids like herbal tea with honey or chicken soup.'),
('sore throat', 'Use throat lozenges or sprays to temporarily relieve the pain.'),
('fatigue', 'Ensure you\'re getting enough sleep and maintaining a regular sleep schedule.'),
('fatigue', 'Eat a balanced diet rich in fruits, vegetables, and whole grains.'),
('fatigue', 'Engage in regular physical activity to boost your energy levels.'),
('back pain', 'Apply a hot or cold compress to the affected area.'),
('back pain', 'Practice good posture and use ergonomic furniture.'),
('back pain', 'Engage in exercises that strengthen your core and back muscles.'),
('allergies', 'Identify and avoid triggers that worsen your allergies.'),
('allergies', 'Use over-the-counter antihistamines or nasal sprays.'),
('allergies', 'Keep your living environment clean and free from dust and allergens.'),
('insomnia', 'Establish a relaxing bedtime routine and stick to a consistent sleep schedule.'),
('insomnia', 'Create a comfortable sleep environment by keeping your bedroom cool, dark, and quiet.'),
('insomnia', 'Limit caffeine intake and avoid electronic devices before bedtime.'),
('anxiety', 'Practice deep breathing exercises or meditation techniques.'),
('anxiety', 'Engage in regular physical exercise to reduce anxiety symptoms.'),
('anxiety', 'Consider talking to a therapist or counselor for additional support.'),
('rash', 'Apply a cold compress to soothe the affected area.'),
('rash', 'Use over-the-counter hydrocortisone cream to reduce itching.'),
('rash', 'Avoid scratching the rash to prevent further irritation.'),
('dizziness', 'Sit or lie down in a comfortable position until the dizziness subsides.'),
('dizziness', 'Drink plenty of fluids to stay hydrated.'),
('dizziness', 'Avoid sudden movements and get up slowly from a lying or sitting position.'),
('congestion', 'Use a saline nasal spray to relieve nasal congestion.'),
('congestion', 'Drink warm liquids like herbal tea or broth to help thin mucus.'),
('congestion', ' Use a humidifier to add moisture to the air and alleviate congestion.'),
('diarrhea', 'Stay hydrated by drinking plenty of fluids like water, clear broth, or electrolyte solutions.'),
('diarrhea', 'Eat bland foods like bananas, rice, applesauce, and toast (BRAT diet).'),
('diarrhea', 'Avoid spicy, greasy, or dairy-based foods until the diarrhea improves.'),
('toothache', 'Rinse your mouth with warm saltwater to reduce pain and inflammation.'),
('toothache', 'Apply a cold compress on the outside of your cheek near the painful area.'),
('toothache', 'Use over-the-counter pain relievers like ibuprofen or acetaminophen as directed.'),
('nausea', 'Drink clear fluids like ginger ale, peppermint tea, or broth to soothe your stomach.'),
('nausea', 'Eat small, frequent meals and avoid greasy or spicy foods.'),
('nausea', 'Try acupressure wristbands or ginger supplements to alleviate nausea.'),
('sunburn', 'Take a cool bath or shower to cool down the burned skin.'),
('sunburn', 'Apply aloe vera gel or a moisturizing lotion to soothe the sunburned area.'),
('sunburn', 'Drink plenty of water to stay hydrated and promote healing.'),
('common cold', 'Rest and get plenty of sleep to support your immune system.'),
('common cold', 'Stay hydrated by drinking fluids like water, herbal tea, or clear broth.'),
('common cold', 'Use over-the-counter cold medications to relieve symptoms such as nasal congestion or cough.'),
(' indigestion', 'Eat smaller, more frequent meals and avoid overeating.'),
('indigestion', 'Avoid trigger foods like spicy or fatty foods, caffeine, and alcohol.'),
('indigestion', 'Take over-the-counter antacids to neutralize stomach acid and relieve indigestion.'),
('muscle strain', 'Rest the affected muscle and avoid activities that worsen the pain.'),
('muscle strain', 'Apply ice packs or cold compresses to reduce inflammation.'),
('muscle strain', 'Use over-the-counter pain relievers and gently stretch the muscle once the acute pain subsides.'),
('acid reflux', 'Eat smaller, more frequent meals and avoid lying down immediately after eating.'),
('acid reflux', 'Elevate the head of your bed to help prevent acid reflux during sleep.'),
('acid reflux', 'Avoid trigger foods such as citrus fruits, spicy foods, and fatty or fried foods.'),
('dry skin', 'Moisturize your skin regularly with a gentle and hydrating lotion or cream.'),
('dry skin', 'Avoid hot showers or baths, as they can strip the skin of natural oils.'),
('dry skin', 'Use a humidifier in your home to add moisture to the air and prevent dryness.'),
('high blood pressure', 'Maintain a healthy diet low in sodium and high in fruits, vegetables, and whole grains.'),
('high blood pressure', 'Engage in regular physical activity and exercise to help lower blood pressure.'),
('high blood pressure', 'Follow your doctor\'s recommendations regarding medication and regular check-ups.'),
('urinary tract infection', 'Drink plenty of water to flush out bacteria from the urinary tract.'),
('urinary tract infection', 'Take over-the-counter pain relievers to alleviate discomfort and pain.'),
('urinay tract infection', 'Contact a healthcare professional for diagnosis and potential prescription of antibiotics if symptoms persist.'),
('sprained ankle', 'Rest and elevate the affected leg to reduce swelling and promote healing.'),
('sprained ankle', 'Apply ice to the ankle for 15-20 minutes every few hours to reduce pain and inflammation.'),
('sprained ankle', 'Use a compression bandage or brace to provide support and stabilize the ankle.'),
('asthma', 'Follow your prescribed asthma management plan, including taking controller medications as directed.'),
('asthma', 'Avoid triggers such as smoke, pollen, pet dander, or cold air that can exacerbate asthma symptoms.'),
('asthma', 'Use a rescue inhaler as needed to relieve sudden asthma symptoms like shortness of breath or wheezing.'),
('hives', 'Take over-the-counter antihistamines to relieve itching and reduce the appearance of hives.'),
('hives', 'Apply a cold compress or take a cool bath to soothe the skin and reduce inflammation.'),
('hives', 'Avoid known triggers such as certain foods, medications, or environmental factors that can cause hives.'),
('muscle cramps', 'Stretch and gently massage the affected muscle to help alleviate the cramp.'),
('muscle cramps', 'Apply a heating pad or take a warm bath to relax the muscle and relieve pain.'),
('muscle cramps', 'Stay well-hydrated and consider drinking electrolyte-rich fluids to prevent muscle cramps.'),
(' food poisoning', 'Stay hydrated by drinking clear fluids like water, electrolyte solutions, or herbal tea.'),
('food poisoning', 'Avoid solid foods for a few hours and gradually reintroduce bland, easy-to-digest foods.'),
('food poisoning', 'Contact a healthcare professional if symptoms worsen or persist for more than a few days.'),
('depression', 'Reach out to a mental health professional for evaluation and potential therapy or counseling.'),
('depression', 'Engage in regular physical exercise, as it can help boost mood and alleviate symptoms of depression.'),
('depression', 'Build a strong support system of friends and loved ones who can provide emotional support.'),
('insect bites', 'Clean the affected area with mild soap and water to prevent infection.'),
('insect bites', 'Apply an over-the-counter hydrocortisone cream or calamine lotion to reduce itching and inflammation.'),
('insect bites', 'Use cold compresses or ice packs to help alleviate pain and swelling from insect bites.'),
(' menstrual cramps', 'Apply a heating pad or use a hot water bottle on the lower abdomen to alleviate menstrual cramps.'),
('menstrual cramps', 'Take over-the-counter pain relievers like ibuprofen or naproxen sodium to reduce pain and inflammation.'),
('menstrual cramps', 'Engage in light exercise or try relaxation techniques like deep breathing to help relax the muscles and reduce cramping.'),
('dry cough', 'Stay hydrated by drinking plenty of fluids, such as water, warm tea, or clear broths.'),
('dry cough', 'Use over-the-counter cough suppressants or lozenges to temporarily relieve cough symptoms.'),
('dry cough', 'Create a humid environment by using a humidifier or taking steamy showers to help soothe the throat and alleviate dry cough.'),
('constipation', 'Increase your fiber intake by eating more fruits, vegetables, whole grains, and legumes.'),
('constiption', 'Stay hydrated by drinking plenty of water and fluids to soften the stool.'),
('constipation', 'Consider taking over-the-counter stool softeners or gentle laxatives as directed to alleviate constipation.'),
('heartburn', 'Avoid trigger foods like spicy, fatty, or acidic foods that can worsen heartburn.'),
('heartburn', 'Eat smaller, more frequent meals and avoid lying down immediately after eating.'),
('heartburn', 'Take over-the-counter antacids or acid reducers to neutralize stomach acid and alleviate heartburn symptoms.'),
('ingrown toenail', 'Soak the affected toe in warm water to soften the skin and reduce inflammation.'),
('ingrown toenail', 'Gently lift the ingrown nail using a clean, sterilized instrument and place a small piece of cotton under the edge to encourage proper growth.'),
('ingrown toenail', 'Wear comfortable, properly-fitting footwear and avoid tight shoes or high heels that can aggravate ingrown toenails.'),
('eye strain', 'Take regular breaks from prolonged screen time and practice the 20-20-20 rule (look away from the screen every 20 minutes at an object 20 feet away for 20 seconds).'),
('eye strain', 'Adjust the lighting and brightness of your screen to reduce eye strain.'),
('eye strain', 'Use artificial tears or lubricating eye drops to relieve dryness and soothe the eyes.'),
('influenza', 'Give your body the time it needs to recover and avoid spreading the flu to others.'),
('influenza', 'Drink plenty of fluids, such as water, herbal tea, or clear broths, to prevent dehydration.'),
('influenza', 'Use over-the-counter medications like pain relievers and decongestants to alleviate symptoms. Consult a healthcare professional for guidance.'),
('diabetes', 'Follow a balanced diet rich in fruits, vegetables, whole grains, and lean proteins. Limit the intake of sugary foods and beverages.'),
('diabetes', 'Engage in regular exercise or physical activity to help manage blood sugar levels and maintain overall health.'),
('diabetes', 'Take prescribed medications as directed by your healthcare provider and monitor blood sugar levels regularly.'),
('skin infection', 'Keep the affected area clean by washing it gently with mild soap and warm water. Apply an antiseptic cream or ointment as recommended.'),
('skin infection', 'Resist the urge to scratch the infected area, as it can worsen the condition and lead to further complications.'),
('skin infection', 'If the infection worsens or doesn\'t improve with home care, seek medical advice for appropriate diagnosis and treatment.'),
('migraine', 'Keep a migraine diary to identify triggers like certain foods, stress, lack of sleep, or hormonal changes, and try to avoid them.'),
('migraine', 'Find a quiet, dark room to rest during a migraine attack and use relaxation techniques like applying a cold or warm compress to the head or neck.'),
('migraine', 'Consult with a healthcare professional to determine suitable over-the-counter or prescription medications to manage and alleviate migraine.'),
('arthritis', 'Engage in low-impact exercises like swimming, cycling, or walking to strengthen muscles, improve joint mobility, and reduce arthritis pain.'),
('arthritis', 'Use warm compresses or take warm baths/showers to soothe stiff joints or cold packs to reduce inflammation and swelling.'),
('arthritis', 'Follow the prescribed medication regimen, including pain relievers, anti-inflammatory drugs, or disease-modifying antirheumatic drugs (DMARDs), as directed by your healthcare provider.'),
('pneumonia', 'If diagnosed with bacterial pneumonia, follow the prescribed antibiotic regimen as directed by your healthcare provider.'),
('pneumonia', 'Get plenty of rest and drink fluids to support recovery and prevent dehydration.'),
('pneumonia', 'Cover your mouth and nose when coughing or sneezing, and wash your hands regularly to prevent the spread of germs.'),
('bronchitis', 'Get plenty of rest to aid in recovery, and drink fluids to thin mucus and relieve cough symptoms.'),
('bronchitis', 'Use a humidifier or inhale steam to help soothe the airways and alleviate coughing.'),
('bronchitis', 'Stay away from smoke, strong fumes, or other irritants that can worsen bronchitis symptoms.'),
('anemia', 'Include iron-rich foods like lean meats, beans, leafy green vegetables, and fortified cereals in your diet.'),
('anemia', 'Consume foods rich in vitamin C, such as citrus fruits, berries, and bell peppers, to enhance iron absorption.'),
('anemia', 'If anemia persists or worsens, consult with a doctor to determine the underlying cause and explore appropriate treatment options.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

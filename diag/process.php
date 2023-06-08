<?php

require __DIR__.'/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;


$open_ai_key = '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'; 
$open_ai = new OpenAi($open_ai_key);


$conn = mysqli_connect("localhost", "root", "", "new") or die("Database Error");


if($input=="head"||$input=='chest'||$input=='stomach'||$input=='leg'){
    
    $keywords = ['head','chest','leg','stomach'];
    $matchedSymptoms = [];
    foreach ($keywords as $keyword) {
        if (stripos($input, $keyword) !== false) {
            $matchedSymptoms[] = $keyword;
        }
    }
    
    
    $suggestions = [];
    if (!empty($matchedSymptoms)) {
        foreach ($matchedSymptoms as $matchedSymptom) {
            $symptomSuggestions = [];
            $sql = "SELECT symptom,name FROM selector WHERE name = '$matchedSymptom'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "We have recognised you have specified a body part";
                echo "<br>";
                echo "<br>";
                echo "Symptoms that occur on $input are given below: ";
                echo "<br>";
                echo "<br>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $symptom = $row['symptom'];
                    $name = $row['name'];

                    
                    // Output clickable elements
                    echo '<div class="clickable-element" style="color: #fff;
                    background: transparent;
                    border-radius: 10px;
                    padding: 8px 10px;
                    font-size: 16px;
                    word-break: break-all;" data-name="' . $symptom . '"> '.$symptom.'</div>';
                }
            
                
            }
            if (!empty($symptomSuggestions)) {
                $suggestions[$matchedSymptom] = $symptomSuggestions;
            }
        }
    }

    
    $response = '';
    if (!empty($suggestions)) {
        foreach ($suggestions as $symptom => $symptomSuggestions) {
            $response .= ucfirst($symptom) . ":\n";
            foreach ($symptomSuggestions as $suggestion) {
                $response .= "- " . $suggestion . "\n";
            }
        }

    }
}else{
$keywords = ['headache', 'cough', 'fever', 'stomachache', 'sore throat', 'fatigue', 'back pain', 'allergies', 'insomnia', 'anxiety', 'rash', 'dizziness', 'congestion', 'diarrhea', 'toothache', 'nausea', 'sunburn', 'common cold', 'indigestion', 'muscle strain', 'acid reflux', 'dry skin', 'high blood pressure', 'urinary tract infection', 'sprained ankle', 'asthma', 'hives', 'muscle cramps', 'food poisoning', 'depression', 'insect bites', 'menstrual cramps', 'dry cough', 'constipation', 'heartburn', 'ingrown toenail', 'eye strain', 'influenza', 'diabetes', 'skin infection', 'migraine', 'arthritis', 'pneumonia', 'bronchitis', 'anemia'];
$matchedSymptoms = [];
foreach ($keywords as $keyword) {
    if (stripos($input, $keyword) !== false) {
        $matchedSymptoms[] = $keyword;
    }
}


$suggestions = [];
if (!empty($matchedSymptoms)) {
    foreach ($matchedSymptoms as $matchedSymptom) {
        $symptomSuggestions = [];
        $sql = "SELECT suggestion FROM suggestions WHERE symptom = '$matchedSymptom'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $symptomSuggestions[] = $row['suggestion'];
            }
        }
        if (!empty($symptomSuggestions)) {
            $suggestions[$matchedSymptom] = $symptomSuggestions;
        }
    }
}


$response = '';
if (!empty($suggestions)) {
    foreach ($suggestions as $symptom => $symptomSuggestions) {
        $response .= ucfirst($symptom) . ":\n";
        foreach ($symptomSuggestions as $suggestion) {
            $response .= "- " . $suggestion . "\n";
        }
    }
} else {
    
   if (stripos($input, 'how can I schedule an appointment') !== false || stripos($input, 'book an appointment') !== false) {
    $response .= "To schedule an appointment, please provide your preferred date and time, and we will do our best to accommodate you.";
}elseif (stripos($input, 'hi') !== false || stripos($input, 'hello') !== false) {
    $response .= "Hello! How can I assist you today?"; 
}elseif (stripos($input, 'what are your working hours') !== false || stripos($input, 'office hours') !== false) {
    $response .= "Our clinic is open from Monday to Friday, 9 AM to 5 PM. We are closed on weekends.";
} elseif (stripos($input, 'do you accept insurance') !== false || stripos($input, 'insurance coverage') !== false) {
    $response .= "Yes, we accept most major insurance plans. Please provide your insurance details, and we can verify coverage for you.";
} elseif (stripos($input, 'what services do you offer') !== false || stripos($input, 'medical treatments') !== false) {
    $response .= "We offer a wide range of medical services, including general check-ups, vaccinations, diagnostic tests, and specialized treatments. How can I assist you specifically?";
} elseif (stripos($input, 'what is your address') !== false || stripos($input, 'location') !== false) {
    $response .= "Our clinic is located at 123 Main Street, Cityville. Please let me know if you need directions.";
} elseif (stripos($input, 'how long does the appointment usually take') !== false || stripos($input, 'appointment duration') !== false) {
    $response .= "The duration of appointments can vary depending on the nature of the visit. On average, appointments last between 30 minutes to an hour.";
} elseif (stripos($input, 'can I reschedule my appointment') !== false || stripos($input, 'change appointment') !== false) {
    $response .= "Yes, you can reschedule your appointment. Please provide your current appointment details, and we will assist you in finding a new suitable time.";
} elseif (stripos($input, 'what should I bring for my appointment') !== false || stripos($input, 'documents required') !== false) {
    $response .= "For your appointment, please bring your identification, insurance card, and any relevant medical records or test results.";
} elseif (stripos($input, 'what are the common side effects') !== false || stripos($input, 'side effects') !== false) {
    $response .= "Common side effects vary depending on the treatment. It's best to consult with your doctor about potential side effects of your specific medication or procedure.";
} elseif (stripos($input, 'how can I refill my prescription') !== false || stripos($input, 'prescription refill') !== false) {
    $response .= "To refill your prescription, you can call our clinic or use our online prescription refill service. Please provide your prescription details, and we will assist you further.";
} elseif (stripos($input, 'do you offer telemedicine services') !== false || stripos($input, 'online consultations') !== false) {
    $response .= "Yes, we offer telemedicine services for certain medical conditions. Please provide more information about your situation, and we can determine if an online consultation is suitable for you.";
} elseif (stripos($input, 'what are the symptoms of') !== false || stripos($input, 'symptoms for') !== false) {
    $response .= "The symptoms of different medical conditions can vary. If you have a specific condition in mind, please let me know, and I can provide you with more information.";
} elseif (stripos($input, 'how long is the recovery time') !== false || stripos($input, 'recovery period') !== false) {
    $response .= "Recovery time can vary depending on the procedure or condition. It's best to consult with your doctor for an accurate estimation of your recovery period.";
} elseif (stripos($input, 'what are the risk factors') !== false || stripos($input, 'risk factors for') !== false) {
    $response .= "Risk factors for different medical conditions can include genetics, lifestyle choices, age, and other factors. If you have a specific condition in mind, please let me know.";
} elseif (stripos($input, 'can I get a second opinion') !== false || stripos($input, 'seek a second opinion') !== false) {
    $response .= "Of course! Seeking a second opinion is a good idea for complex or serious medical conditions. I can help you find another qualified doctor for a second opinion.";
} elseif (stripos($input, 'how can I prevent') !== false || stripos($input, 'prevention tips for') !== false) {
    $response .= "Prevention strategies vary depending on the condition. If you have a specific condition in mind, please let me know, and I can provide you with preventive measures.";
} elseif (stripos($input, 'what are the treatment options') !== false || stripos($input, 'treatment for') !== false) {
    $response .= "Treatment options depend on the specific condition. If you have a particular condition in mind, please let me know, and I can provide you with information about available treatments.";
} elseif (stripos($input, 'can you recommend a specialist') !== false || stripos($input, 'find a specialist') !== false) {
    $response .= "Certainly! Please provide the area of specialization you're looking for, and I can recommend a qualified specialist in that field.";
} elseif (stripos($input, 'what should I do in case of an emergency') !== false || stripos($input, 'emergency situation') !== false) {
    $response .= "In case of a medical emergency, please dial your country's emergency services number immediately (e.g., 911). If you need guidance during a non-emergency situation, please provide more details about your concern.";
} elseif (stripos($input, 'how can I manage my condition') !== false || stripos($input, 'self-management tips') !== false) {
    $response .= "Self-management strategies depend on the condition. If you have a specific condition in mind, please let me know, and I can provide you with tips for managing it.";
} elseif (stripos($input, 'what tests are commonly performed') !== false || stripos($input, 'common diagnostic tests') !== false) {
    $response .= "Common diagnostic tests include blood tests, X-rays, MRI scans, CT scans, ultrasounds, and biopsies. The specific tests recommended depend on the suspected condition.";
} elseif (stripos($input, 'can I drink alcohol while taking medication') !== false || stripos($input, 'alcohol and medication') !== false) {
    $response .= "It's best to consult with your doctor or pharmacist regarding the specific medication you are taking. They can provide guidance on whether it is safe to consume alcohol while on medication.";
} elseif (stripos($input, 'what should I do if I miss a dose') !== false || stripos($input, 'missed dose') !== false) {
    $response .= "If you miss a dose of your medication, refer to the instructions provided with the medication or consult your doctor or pharmacist for guidance on what to do in such cases.";
} elseif (stripos($input, 'are there any dietary restrictions') !== false || stripos($input, 'dietary considerations') !== false) {
    $response .= "Dietary restrictions can vary depending on the condition and medication. It's best to consult with your doctor or a registered dietitian for personalized dietary advice.";
} elseif (stripos($input, 'what are the potential complications') !== false || stripos($input, 'complications of') !== false) {
    $response .= "Potential complications of different medical conditions or procedures can vary widely. If you have a specific condition or procedure in mind, please let me know.";
} elseif (stripos($input, 'how long does it take to get test results') !== false || stripos($input, 'test result timeframe') !== false) {
    $response .= "The time it takes to receive test results depends on the specific test and the laboratory conducting it. Your healthcare provider can provide you with an estimated timeframe.";
} elseif (stripos($input, 'what are the warning signs') !== false || stripos($input, 'warning signs of') !== false) {
    $response .= "Warning signs of different medical conditions can vary. If you have a specific condition in mind, please let me know, and I can provide you with more information.";
} elseif (stripos($input, 'how can I lower my risk') !== false || stripos($input, 'risk reduction tips') !== false) {
    $response .= "Risk reduction strategies depend on the condition. If you have a specific condition in mind, please let me know, and I can provide you with tips to lower your risk.";
} elseif (stripos($input, 'can you explain the procedure') !== false || stripos($input, 'procedure details') !== false) {
    $response .= "Certainly! Please provide the specific procedure you're referring to, and I can provide you with detailed information about it.";
} elseif (stripos($input, 'how can I prepare for surgery') !== false || stripos($input, 'surgery preparation') !== false) {
    $response .= "Surgery preparation instructions can vary depending on the type of surgery. Your surgeon will provide you with specific guidelines to follow before the procedure.";
} elseif (stripos($input, 'what is the recovery process like') !== false || stripos($input, 'post-surgery recovery') !== false) {
    $response .= "The recovery process after surgery depends on the type of surgery performed. Your doctor will provide you with post-operative instructions and monitor your progress.";
} elseif (stripos($input, 'what is the success rate of the procedure') !== false || stripos($input, 'procedure success rate') !== false) {
    $response .= "Success rates of medical procedures can vary. It's best to consult with your doctor or refer to medical studies and statistics for accurate information on the success rates of specific procedures.";
} elseif (stripos($input, 'what are the potential side effects') !== false || stripos($input, 'side effects of') !== false) {
    $response .= "Potential side effects of different medications or treatments can vary. It's important to consult with your doctor or pharmacist for a comprehensive list of potential side effects.";
} elseif (stripos($input, 'can I take over-the-counter medication') !== false || stripos($input, 'OTC medication') !== false) {
    $response .= "It depends on your specific medical condition and the medications you are currently taking. It's best to consult with your doctor or pharmacist before taking any over-the-counter medication.";
} elseif (stripos($input, 'how can I manage pain') !== false || stripos($input, 'pain management') !== false) {
    $response .= "Pain management strategies vary depending on the cause and severity of the pain. Non-pharmacological approaches, such as rest, ice, compression, and elevation (RICE), can help. Additionally, over-the-counter pain relievers may provide temporary relief, but it's important to consult with your doctor for a proper evaluation and guidance.";
} elseif (stripos($input, 'what should I do if I have an allergic reaction') !== false || stripos($input, 'allergic reaction symptoms') !== false) {
    $response .= "If you experience symptoms of an allergic reaction, such as difficulty breathing, swelling, or hives, seek immediate medical attention. Call your local emergency services or go to the nearest emergency room.";
} elseif (stripos($input, 'how can I improve my sleep') !== false || stripos($input, 'sleep improvement tips') !== false) {
    $response .= "To improve sleep, establish a regular sleep schedule, create a comfortable sleep environment, limit exposure to electronic devices before bed, and practice relaxation techniques. If sleep issues persist, it's advisable to consult with a healthcare professional.";
} elseif (stripos($input, 'what are the recommended vaccinations') !== false || stripos($input, 'vaccination schedule') !== false) {
    $response .= "Recommended vaccinations vary depending on factors such as age, health condition, and location. Consult with your doctor or refer to official vaccination guidelines provided by health authorities for an accurate vaccination schedule.";
} elseif (stripos($input, 'what should I do if I have a fever') !== false || stripos($input, 'fever management') !== false) {
    $response .= "If you have a fever, it's important to rest, stay hydrated, and monitor your temperature. Over-the-counter fever reducers like acetaminophen or ibuprofen can be used following the recommended dosage. However, if the fever persists, worsens, or is accompanied by severe symptoms, consult with a healthcare professional.";
} elseif (stripos($input, 'how can I lower my blood pressure') !== false || stripos($input, 'blood pressure management') !== false) {
    $response .= "To lower blood pressure, lifestyle modifications such as regular exercise, maintaining a healthy weight, reducing sodium intake, and adopting a balanced diet rich in fruits, vegetables, and whole grains can be beneficial. However, for individuals with high blood pressure, it's essential to consult with a healthcare professional for personalized advice.";
} elseif (stripos($input, 'what are the warning signs of a heart attack') !== false || stripos($input, 'heart attack symptoms') !== false) {
    $response .= "Warning signs of a heart attack include chest pain or discomfort, shortness of breath, nausea, lightheadedness, and pain or discomfort in the arm, back, neck, or jaw. If you experience these symptoms, seek immediate medical attention by calling emergency services.";
} elseif (stripos($input, 'how can I quit smoking') !== false || stripos($input, 'smoking cessation') !== false) {
    $response .= "Quitting smoking is beneficial for your health. Strategies to quit smoking include setting a quit date, seeking support from friends, family, or support groups, and considering nicotine replacement therapy or prescription medications. It's advisable to consult with a healthcare professional for personalized guidance on quitting smoking.";
} elseif (stripos($input, 'what are the risk factors for diabetes') !== false || stripos($input, 'diabetes risk factors') !== false) {
    $response .= "Risk factors for diabetes include family history, obesity, sedentary lifestyle, high blood pressure, and unhealthy eating habits. If you have concerns about your risk of developing diabetes, consult with a healthcare professional for a comprehensive evaluation.";
} elseif (stripos($input, 'what are the symptoms of depression') !== false || stripos($input, 'depression symptoms') !== false) {
    $response .= "Symptoms of depression can include persistent sadness, loss of interest or pleasure in activities, changes in appetite or weight, sleep disturbances, fatigue, feelings of guilt or worthlessness, difficulty concentrating, and thoughts of self-harm. If you or someone you know is experiencing these symptoms, it's important to seek professional help.";
} elseif (stripos($input, 'how can I boost my immune system') !== false || stripos($input, 'immune system boosting') !== false) {
    $response .= "To support a healthy immune system, maintain a balanced diet rich in fruits, vegetables, whole grains, and lean proteins. Get regular exercise, sufficient sleep, manage stress, and avoid smoking or excessive alcohol consumption. However, it's important to note that no specific food or supplement can prevent or cure diseases.";
} elseif (stripos($input, 'what are the signs of a stroke') !== false || stripos($input, 'stroke symptoms') !== false) {
    $response .= "Signs of a stroke include sudden weakness or numbness on one side of the face or body, confusion, trouble speaking or understanding speech, severe headache, dizziness, and difficulty walking. If you suspect a stroke, call emergency services immediately.";
} elseif (stripos($input, 'how can I protect myself from sexually transmitted infections') !== false || stripos($input, 'STI prevention') !== false) {
    $response .= "To protect yourself from sexually transmitted infections (STIs), practice safe sex by using condoms, getting regular STI screenings, and limiting sexual partners. It's also important to have open and honest communication with your sexual partners about STI status.";
} elseif (stripos($input, 'what are the symptoms of a urinary tract infection') !== false || stripos($input, 'urinary tract infection symptoms') !== false) {
    $response .= "Symptoms of a urinary tract infection (UTI) can include a strong and persistent urge to urinate, a burning sensation during urination, cloudy or bloody urine, strong-smelling urine, and pelvic pain. If you suspect a UTI, consult with a healthcare professional for proper diagnosis and treatment.";
} elseif (stripos($input, 'how can I prevent sports injuries') !== false || stripos($input, 'sports injury prevention') !== false) {
    $response .= "To prevent sports injuries, warm up before exercising, wear appropriate protective gear, use proper technique and form, gradually increase intensity and duration of activities, and listen to your body's limits. It's also important to have a balanced training program that includes strength and flexibility exercises.";
} elseif (stripos($input, 'what are the symptoms of an allergic reaction') !== false || stripos($input, 'allergic reaction symptoms') !== false) {
    $response .= "Symptoms of an allergic reaction can include itching, rash, hives, swelling, shortness of breath, wheezing, and anaphylaxis. If you experience severe symptoms or have a known allergy, seek immediate medical attention.";
} elseif (stripos($input, 'how can I improve my digestion') !== false || stripos($input, 'digestive health tips') !== false) {
    $response .= "To improve digestion, consume a balanced diet with plenty of fiber-rich foods, stay hydrated, manage stress levels, and engage in regular physical activity. If you have persistent digestive issues, it's recommended to consult with a healthcare professional.";
} elseif (stripos($input, 'what are the symptoms of anemia') !== false || stripos($input, 'anemia symptoms') !== false) {
    $response .= "Symptoms of anemia can include fatigue, weakness, pale skin, shortness of breath, dizziness, headache, and cold hands and feet. If you suspect you may have anemia, it's important to consult with a healthcare professional for proper diagnosis and treatment.";
} elseif (stripos($input, 'how can I improve my cardiovascular health') !== false || stripos($input, 'cardiovascular health tips') !== false) {
    $response .= "To improve cardiovascular health, maintain a healthy diet, engage in regular aerobic exercise, manage stress levels, avoid smoking, limit alcohol consumption, and monitor blood pressure and cholesterol levels. It's advisable to consult with a healthcare professional for personalized advice.";
} elseif (stripos($input, 'what are the symptoms of an anxiety disorder') !== false || stripos($input, 'anxiety disorder symptoms') !== false) {
    $response .= "Symptoms of an anxiety disorder can include excessive worry, restlessness, irritability, difficulty concentrating, sleep disturbances, and physical symptoms like increased heart rate and shortness of breath. If you suspect you may have an anxiety disorder, it's important to seek professional help.";
} elseif (stripos($input, 'how can I improve my mental well-being') !== false || stripos($input, 'mental well-being tips') !== false) {
    $response .= "To improve mental well-being, practice self-care, engage in activities you enjoy, maintain social connections, manage stress, get sufficient sleep, and seek professional help if needed. Remember, it's okay to ask for support when necessary.";
} elseif (stripos($input, 'what are the symptoms of a concussion') !== false || stripos($input, 'concussion symptoms') !== false) {
    $response .= "Symptoms of a concussion can include headache, dizziness, confusion, memory problems, nausea or vomiting, sensitivity to light or noise, and changes in sleep patterns. If you suspect a concussion, seek medical evaluation and avoid activities that may worsen symptoms.";
} else {
        
    $complete = $open_ai->completion([
        'model' => 'text-davinci-003',
        'prompt' => 'generate reply only if it is about medical with 3 suggestom and without any doctor consult'.$input,
        'temperature' => 0.9,
        'max_tokens' => 150,
        'frequency_penalty' => 0,
        'presence_penalty' => 0.6,
    ]);

    $botResponse = json_decode($complete, true);
    $botResponse = $botResponse["choices"][0]["text"];
        $response .= $botResponse;
    }


}
echo $response;
$conn->close();



}

?>
<html><head>
<script>
    $(document).on('click', '.clickable-element', function() {
        var clickedId = $(this).data('name');
        var formElement = $('.form');  // Store the form element in a variable
        
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: { in: clickedId },
            success: function(response) {
                // Check if the response is not already appended
   
                    formElement.append('<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + response + '</p></div></div>');
                    formElement.scrollTop(formElement[0].scrollHeight);
                
            }
        });
    });
</script>
</head></html>
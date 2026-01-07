<?php
require 'vendor/autoload.php';

use Gemini\Enums\MimeType;
use Gemini\Enums\Role;
use Gemini\Data\Part;
use Gemini\Data\Content;
use Gemini\Data\Blob; 
use Gemini\Factory;


$apiKey = 'API_KEY'; // Set up your API Key: https://aistudio.google.com/u/1/api-keys  
$client = Gemini::client($apiKey);

$audioFilePath = 'audiofile.m4a'; // Set up your audio file

echo "Checking file...\n";

if (!file_exists($audioFilePath)) {
    die("Error: File not found.\n");
}
$fileSize = filesize($audioFilePath);
echo "   File size: " . round($fileSize / 1024, 2) . " KB\n";


$mimeEnum = MimeType::tryFrom('audio/mp4') 
    ?? MimeType::tryFrom('audio/mpeg') 
    ?? MimeType::tryFrom('audio/aac'); 


if (!$mimeEnum) {
    die("Error: Your library version doesn't support the audio types listed.");
}




$base64Data = base64_encode(file_get_contents($audioFilePath));



$myParts = [
    new Part(text: 'Transcribe this audio file accurately, it was recorded in Kenya(Swahili/Sheng/English). Format as a dialogue.'),
    new Part(
        inlineData: new Blob(
            mimeType: $mimeEnum, 
            data: $base64Data
        )
    )
];

$contentObject = new Content(
    parts: $myParts,
    role: Role::USER
);

try {

    $response = $client->generativeModel(model: 'gemini-pro-latest')->generateContent($contentObject);
    
    echo "\nTranscript ---\n";
    echo $response->text();

} catch (Exception $e) {
    echo "\nError: " . $e->getMessage() . "\n";
}
?>

<?php
require_once ABSPATH . '/wp-content/themes/twentytwentyfour/dalle_ai/vendor/autoload.php';
use Orhanerday\OpenAi\OpenAi;

$dall_e_api_key = get_option('dall_e_api_key');
$open_ai = new OpenAi($dall_e_api_key);
$prompt = isset($_POST['prompt']) ? sanitize_text_field($_POST['prompt']) : '';

if (!empty($prompt)) {
    $complete = $open_ai->image([
        "prompt" => $prompt,
        "n" => 2,
        "size" => "1024x1024",
        "response_format" => "b64_json",
    ]);

    header('Content-Type: application/json');
    echo json_encode(['data' => $complete]);
} 
else {
    // Handle the case where no prompt is provided
    echo json_encode(['error' => 'No prompt provided']);
}
?>
<?php
// Respuestas predeterminadas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userMessage = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // Respuestas simples
    $responses = [
        'hola' => '¡Hola! ¿En qué puedo ayudarte hoy?',
        'cómo estás' => 'Estoy bien, gracias por preguntar.',
        'gracias' => '¡De nada! Si necesitas algo más, aquí estoy.',
        'adiós' => '¡Hasta luego!',
        'default' => 'Lo siento, no entiendo lo que dices. ¿Puedes intentar de nuevo?'
    ];

    // Respuesta del bot
    $response = isset($responses[strtolower($userMessage)]) ? $responses[strtolower($userMessage)] : $responses['default'];

    // Devolver la respuesta como JSON
    echo json_encode(['response' => $response]);
    exit;
}
?>

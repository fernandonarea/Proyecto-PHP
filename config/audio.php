<?php
// Definir la ruta base de los assets
$baseDir = __DIR__ . '/../assets/audios/';

// Obtener el nombre del archivo
$file = isset($_GET['file']) ? $_GET['file'] : '';

// Validar el nombre del archivo
$filePath = $baseDir . basename($file);

// Verificar si el archivo existe
if (file_exists($filePath)) {
    // Determinar el tipo de contenido
    $mimeType = mime_content_type($filePath);
    header('Content-Type: ' . $mimeType);
    header('Content-Length: ' . filesize($filePath));
    
    // Enviar el archivo al navegador
    readfile($filePath);
    exit;
} else {
    // Archivo no encontrado
    header("HTTP/1.0 404 Not Found");
    echo "File not found.";
    exit;
}




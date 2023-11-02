<?php
// sysfoo.php

// Function to get the hostname
if (!function_exists('getHostname')) {
    function getHostname() {
        return gethostname();
    }
}

// Function to get the IP address
if (!function_exists('getIpAddress')) {
    function getIpAddress() {
        // This gets the server IP address, might not work correctly if server is behind a proxy or load balancer
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $_SERVER['SERVER_ADDR'];
    }
}

// Function to check if it's a container
if (!function_exists('isContainer')) {
    function isContainer() {
        // Check for the .dockerenv file which is typically present in Docker containers
        return file_exists('/.dockerenv') ? 'Yes' : 'No';
    }
}

// Function to check if it's running inside Kubernetes
if (!function_exists('isInKubernetes')) {
    function isInKubernetes() {
        // This checks for the Kubernetes service account which is typically present in Kubernetes pods
        return file_exists('/var/run/secrets/kubernetes.io/serviceaccount') ? 'Yes' : 'No';
    }
}

// HTML and PHP mixed content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Information</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { width: 80%; margin: auto; padding: 20px; }
        .info-box { background-color: #f4f4f4; border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>System Information</h1>
        <div class="info-box">
            <strong>Hostname:</strong> <?php echo getHostname(); ?>
        </div>
        <div class="info-box">
            <strong>IP Address:</strong> <?php echo getIpAddress(); ?>
        </div>
        <div class="info-box">
            <strong>Container:</strong> <?php echo isContainer(); ?>
        </div>
        <div class="info-box">
            <strong>Kubernetes:</strong> <?php echo isInKubernetes(); ?>
        </div>
    </div>
</body>
</html>

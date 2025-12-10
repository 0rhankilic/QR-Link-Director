<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'veritabani.php';

// SLUG al (örneğin: /link/0001)
$slug = '';
if (isset($_SERVER['PATH_INFO'])) {
    $slug = trim($_SERVER['PATH_INFO'], '/');
}

if (!empty($slug)) {
    $stmt = $conn->prepare("SELECT url FROM redirects WHERE slug = ?");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $url = trim($row['url']);

        // Eğer http veya https ile başlamıyorsa başına https:// ekle
        if (!preg_match('#^https?://#i', $url)) {
            $url = 'https://' . ltrim($url, '/');
        }

        // Meta refresh + fallback
        echo '<!DOCTYPE html><html><head>';
        echo '<meta http-equiv="refresh" content="0;url=' . htmlspecialchars($url) . '">';
        echo '<meta property="og:title" content="Yönlendiriliyorsunuz...">';
        echo '<meta property="og:description" content="Kısa link ile yönlendiriliyorsunuz.">';
        echo '<meta property="og:url" content="' . htmlspecialchars($url) . '">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Yönlendiriliyor...</title>';
        echo '</head><body>';
        echo 'Yönlendiriliyorsunuz... <a href="' . htmlspecialchars($url) . '">Gitmek için tıklayın</a>';
        echo '</body></html>';

        // Yönlendirme (asıl yöntem)
        header("Location: $url");
        exit;
    } else {
        http_response_code(404);
        echo '<!DOCTYPE html><html><head><title>Link Bulunamadı</title></head><body>';
        echo '❌ Bu link geçersiz veya silinmiş olabilir. <br> <a href="/">Ana sayfaya dön</a>';
        echo '</body></html>';
    }
} else {
    echo "❗ Lütfen geçerli bir bağlantı kullanın.";
}
?>

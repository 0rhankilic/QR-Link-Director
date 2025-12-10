<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'veritabani.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $slug = trim($_POST['slug']);
    $url = trim($_POST['url']);

    // Eğer http:// veya https:// yoksa otomatik ekle
    if (!preg_match('/^https?:\/\//', $url)) {
        $url = 'https://' . $url;
    }

    if (!empty($slug) && !empty($url)) {
        $stmt = $conn->prepare("INSERT INTO redirects (slug, url) VALUES (?, ?)
                                ON DUPLICATE KEY UPDATE url = VALUES(url)");
        $stmt->bind_param("ss", $slug, $url);
        if ($stmt->execute()) {
            echo "✅ Başarıyla kaydedildi.";
        } else {
            echo "❌ Hata: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Slug ve URL boş olamaz.";
    }
}
?>

<form method="POST">
    <input name="slug" placeholder="örnek: 0001" required>
    <input name="url" placeholder="örnek: www.youtube.com" required>
    <button type="submit">Kaydet</button>
</form>

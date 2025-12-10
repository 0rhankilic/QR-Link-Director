# 🔗 QR-Link-Director

PHP ile Dinamik Yönlendirmeli QR Kod Yönetim Sistemi

Bu proje, önceden oluşturulmuş QR kodlarının daha sonra yeniden yönlendirilebilmesini sağlayan basit bir QR yönetim paneli içerir.
Yapısı tamamen PHP ile oluşturulmuştur ve geliştirme sürecinin önemli kısmında yapay zekâ destekli kod üretimi kullanılmıştır.

✨ Özellikler

📌 Tek bir QR kodu, istediğiniz zaman farklı bir URL’ye yönlendirebilirsiniz

🗂️ Birden fazla QR kodu için yönetim paneli

📝 Her QR kodu için isim, açıklama, hedef URL kaydı

🔄 Anlık URL güncellemesi (QR kodunu yeniden basmaya gerek yok)

📊 Tıklanma/ziyaret sayısı takibi (opsiyonel)

🧩 Kolay kurulum, sade PHP yapısı

🔐 Basit admin paneli (login sistemi opsiyonel)

📄 Nasıl Çalışır?

Panelden bir QR kaydı oluşturursun

Sistem bu QR’a özel bir kısa yol üretir:

https://site.com/r?id=52


QR kod basılırken bu link kullanılır

Daha sonra panelden hedef URL'yi istediğin zaman değiştirirsin

QR kod hep aynı kalır ama ziyaretçi her seferinde güncel URL’ye yönlenir

🔧 Teknik Detaylar

Backend: PHP 7+

Veritabanı: MySQL

QR üretimi:
PHP ile URL üretimi veya opsiyonel QR API güdümlü

Yönlendirme:

header("Location: $targetUrl");
exit;


Kod yapısı yapay zekâ tarafından üretilip geliştirici tarafından düzenlenmiştir.


🛠️ Admin Panel (Varsa)

Eğer senin projende giriş paneli varsa şu şekilde yazabilirim:

/login.php → Yönetici girişi

/dashboard.php → QR kod listesi

/edit.php → URL güncelleme




# Sakarya Büyükşehir Belediyesi - Bilgi İşlem Daire Başkanlığı Web Sitesi

## Proje Hakkında

Bu proje, Sakarya Büyükşehir Belediyesi Bilgi İşlem Daire Başkanlığı'nı tanıtan kapsamlı bir web sitesidir. 2025 Yaz Stajı kapsamında geliştirilmiş olup, modern web teknolojileri kullanılarak responsive tasarım ile oluşturulmuştur.

## Özellikler

### 🎨 Tasarım ve Kullanıcı Deneyimi
- **Responsive Tasarım**: Tüm cihazlarda mükemmel görünüm
- **Modern UI/UX**: Bootstrap 5 ile geliştirilmiş modern arayüz
- **Animasyonlar**: Smooth scroll, fade-in efektleri ve interaktif elementler
- **Sakarya Belediyesi Logosu**: Resmi logo entegrasyonu

### 📱 Sayfa Bölümleri
1. **Anasayfa**: Kurum logosu, slogan ve genel tanıtım
2. **Hakkımızda**: Misyon, vizyon ve değerler
3. **Müdürlüklerimiz**: 4 farklı şube müdürlüğü tanıtımı
4. **Projelerimiz**: Belediye projelerinin listesi
5. **Galeri**: Görsel slider (4 görsel)
6. **İletişim**: Form validasyonlu iletişim sayfası
7. **Giriş**: PHP tabanlı login sistemi

### 🔧 Teknik Özellikler
- **HTML5**: Semantic markup
- **CSS3**: Modern stiller ve animasyonlar
- **JavaScript**: Form validasyonları ve interaktif özellikler
- **PHP**: Güvenli login sistemi
- **Bootstrap 5**: Responsive framework
- **Font Awesome**: İkon kütüphanesi

## Müdürlükler

### 1. Bilişim Sistemleri ve Donanım Şube Müdürlüğü
- Sunucu ve ağ sistemleri yönetimi
- Donanım alımı ve bakımı
- Sistem güvenliği ve yedekleme
- Teknik destek hizmetleri

### 2. Coğrafi Bilgi Sistemleri Şube Müdürlüğü
- Harita ve mekansal veri yönetimi
- Şehir planlama CBS uygulamaları
- Arazi ve imar verileri analizi
- 3D şehir modelleme

### 3. Elektronik ve Haberleşme Sistemleri Şube Müdürlüğü
- Telekomünikasyon sistemleri
- Akıllı şehir uygulamaları
- Elektronik güvenlik sistemleri
- IoT ve sensör teknolojileri

### 4. Yazılım Şube Müdürlüğü
- Web ve mobil uygulama geliştirme
- Veritabanı yönetimi
- E-belediye sistemleri
- Yazılım test ve kalite kontrol

## Kurulum ve Çalıştırma

### Gereksinimler
- Web sunucusu (Apache/Nginx)
- PHP 7.4 veya üzeri
- Modern web tarayıcısı

### Kurulum Adımları
1. Projeyi web sunucunuzun root dizinine kopyalayın
2. `auth` klasörü için yazma izinlerini ayarlayın
3. Tarayıcınızda `index.html` dosyasını açın

## 🧪 Test Kullanıcıları

### Giriş Bilgileri:
```
🔐 Admin Kullanıcısı:
   E-posta: admin@sakarya.bel.tr
   Şifre: admin123
   Rol: Sistem Yöneticisi

👤 Normal Kullanıcı:
   E-posta: user@sakarya.bel.tr
   Şifre: user123
   Rol: Kullanıcı

👨‍💼 Bilgi İşlem Personeli:
   E-posta: bilgiislem@sakarya.bel.tr
   Şifre: bilgi123
   Rol: Personel
```

### Test Senaryoları:
1. **Geçersiz E-posta Formatı**: `test@invalid` (Hata mesajı gösterir)
2. **Boş Alanlar**: E-posta veya şifre boş bırakıldığında uyarı verir
3. **Yanlış Bilgiler**: Geçersiz kullanıcı adı/şifre kombinasyonu
4. **Başarılı Giriş**: Yukarıdaki test kullanıcılarından herhangi biri ile giriş yapılabilir

## Dosya Yapısı

```
odev/
├── index.html              # Ana sayfa (616 satır)
├── assets/
│   ├── css/
│   │   └── style.css       # Özel CSS stilleri (698 satır)
│   ├── js/
│   │   └── main.js         # JavaScript fonksiyonları (554 satır)
│   └── images/             # Görsel dosyaları
├── auth/
│   └── login.php           # PHP login sistemi (314 satır)
└── README.md               # Proje dokümantasyonu
```

## Özellikler Detayı

### Form Validasyonları
- **İletişim Formu**: Ad, soyad, e-posta, konu ve mesaj validasyonu
- **Login Formu**: E-posta formatı ve şifre kontrolü
- **JavaScript**: Client-side validasyon
- **PHP**: Server-side güvenlik

### Güvenlik Özellikleri
- CSRF koruması
- Session yönetimi
- Güvenlik başlıkları
- Input sanitization
- Login log sistemi

### Responsive Tasarım
- Mobile-first yaklaşım
- Bootstrap grid sistemi
- Esnek görsel düzen
- Touch-friendly arayüz

## Teknolojiler

### Frontend
- **HTML5**: Semantic markup ve accessibility
- **CSS3**: CSS variables, flexbox, grid, animations
- **JavaScript**: ES6+, DOM manipulation, AJAX
- **Bootstrap 5**: Responsive framework
- **Font Awesome 6**: İkon kütüphanesi

### Backend
- **PHP 7.4+**: Server-side logic
- **Session Management**: Güvenli oturum yönetimi
- **File I/O**: Log dosyası yazma

## Proje Gereksinimleri Kontrol Listesi

✅ **Tamamlanan Gereksinimler:**

### ✅ Responsive Tasarım
- [x] Bootstrap kullanımı
- [x] Mobil uyumlu tasarım
- [x] Tüm cihazlarda çalışır

### ✅ Özel Tasarım
- [x] Hazır tema kullanımı yok
- [x] Özel CSS stilleri
- [x] Özel JavaScript kodları

### ✅ Sayfa Bölümleri
- [x] Anasayfa (Logo, slogan, genel tanıtım)
- [x] Hakkımızda (Misyon, vizyon, değerler)
- [x] Müdürlüklerimiz (4 şube müdürlüğü kartları)
- [x] Projelerimiz (6 farklı proje)
- [x] Galeri (4 görsel, modal açılma)
- [x] İletişim (Form validasyonu)
- [x] Giriş (PHP login sistemi)

### ✅ Teknik Gereksinimler
- [x] Harici CSS dosyası (`assets/css/style.css`)
- [x] Harici JavaScript dosyası (`assets/js/main.js`)
- [x] PHP tabanlı login sistemi (`auth/login.php`)
- [x] E-posta formatı kontrolü
- [x] Form validasyonları
- [x] Sakarya Belediyesi logosu kullanımı

### ✅ Form Validasyonları
- [x] İletişim formu JavaScript validasyonu
- [x] Login formu e-posta formatı kontrolü
- [x] Boş alan kontrolü
- [x] Client-side ve server-side validasyon

### ✅ Güvenlik
- [x] CSRF koruması
- [x] Session yönetimi
- [x] Input sanitization
- [x] Güvenlik başlıkları

## Geliştirici

**Stajyer:** [Melek YAVAŞ]  
**Okul:** [Karasu Meslek Yüksekokulu Bilgisayar Programcılığı]  
**Numara:** [24370101063]  
**Staj Birimi:** Sakarya Büyükşehir Belediyesi - Bilgi İşlem Daire Başkanlığı  
**Proje Adı:** Bilgi İşlem Daire Başkanlığı Web Sitesi  
**GitHub:** [GitHub Linki]  
**Proje URL:** [Canlı Site Linki]  

## Sonraki Adımlar

### 🔄 GitHub Kullanımı
1. GitHub hesabı oluşturun
2. Yeni repository oluşturun
3. Projeyi yükleyin
4. En az 10 farklı commit yapın:
   - İlk commit: Proje yapısı
   - CSS stilleri eklendi
   - JavaScript fonksiyonları eklendi
   - PHP login sistemi eklendi
   - Responsive tasarım iyileştirmeleri
   - Form validasyonları eklendi
   - Güvenlik özellikleri eklendi
   - Animasyonlar eklendi
   - Test kullanıcıları eklendi
   - Final düzenlemeler

### 🌐 Canlı Hosting
1. **000webhost** veya **InfinityFree** hesabı oluşturun
2. Projeyi yükleyin
3. Domain adresini alın
4. SSL sertifikası ekleyin

### 📋 Proje Raporu
1. Ekran görüntüleri alın
2. Proje açıklaması yazın
3. Teknik detayları belirtin
4. GitHub ve canlı site linklerini ekleyin

## Lisans

Bu proje Sakarya Büyükşehir Belediyesi için geliştirilmiştir. Tüm hakları saklıdır.

## İletişim

**Sakarya Büyükşehir Belediyesi**  
**Bilgi İşlem Daire Başkanlığı**  
📞 (264) 275 10 00  
📧 bilgiislem@sakarya.bel.tr  
📍 Sakarya, Türkiye

---

*Bu proje 2025 Yaz Stajı kapsamında geliştirilmiştir.*

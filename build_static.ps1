<#
build_static.ps1

Kullanım:
1. Apache'yi XAMPP ile başlatın (http://localhost/fitlife çalışıyor olmalı).
2. Proje dizininde PowerShell'de çalıştırın:
   .\build_static.ps1 -BaseUrl 'http://localhost/fitlife'

Betik, verilen PHP sayfalarını `dist/<pagename>/index.html` olarak kaydeder.
#>

param(
    [string]$BaseUrl = 'http://localhost/fitlife'
)

Write-Output "Çalışma dizini: $(Get-Location)"
Write-Output "Base URL: $BaseUrl"

$pages = @(
    'index.php',
    'besinler.php',
    'egzersiz.php',
    'hakkimda.php',
    'iletisim.php',
    'login.php',
    'logout.php',
    'panel.php',
    'register.php',
    'vucut_haritasi.php'
)

$outDir = Join-Path -Path (Get-Location) -ChildPath 'dist'
if (Test-Path $outDir) { Remove-Item $outDir -Recurse -Force }
New-Item -ItemType Directory -Path $outDir | Out-Null

foreach ($p in $pages) {
    $url = "$BaseUrl/$p"
    Write-Output "Alınıyor: $url"
    try {
        $resp = Invoke-WebRequest -Uri $url -UseBasicParsing -ErrorAction Stop
        $html = $resp.Content

        # Basit içerik dönüşümleri: .php uzantılarını dizin biçimine çevir
        # href/src içinde .php geçenleri sonundaki uzantıyı kaldırıp '/' ile değiştirir
        $html = $html -replace '\.php(?=")', '/'
        $html = $html -replace "\.php(?=')", '/'

        # Örnek: index.php -> / (ana sayfa)
        if ($p -eq 'index.php') {
            $targetDir = $outDir
            $targetFile = Join-Path $targetDir 'index.html'
        } else {
            $name = [System.IO.Path]::GetFileNameWithoutExtension($p)
            $targetDir = Join-Path $outDir $name
            New-Item -ItemType Directory -Path $targetDir -Force | Out-Null
            $targetFile = Join-Path $targetDir 'index.html'
        }

        # Basit URL düzeltmeleri: /fitlife/ öneklerini kaldır (Vercel root'da çalışacak)
        $html = $html -replace '/fitlife/', '/'

        Set-Content -Path $targetFile -Value $html -Encoding UTF8
        Write-Output "Yazıldı: $targetFile"
    } catch {
        Write-Output "Hata alınırken: $url -> $_"
    }
}

Write-Output "Statik build tamamlandı. Çıktı klasörü: $outDir"

-- Rentalin: isi foto spesifik untuk setiap kendaraan berdasarkan nama unit.
-- Jalankan pada database rentalin yang sudah ada. Tidak menghapus tabel atau data.
UPDATE vehicles SET image = CASE name
    WHEN 'Honda Vario 160' THEN 'https://radartasik.disway.id/upload/ad66a4d53a26e0cec0f495802e4215ea.jpg'
    WHEN 'Yamaha NMAX' THEN 'https://www.yamaha-motor.co.jp/mc/lineup/nmax/img/nmax_price_2022.jpg'
    WHEN 'Toyota Avanza' THEN 'https://www.autopediame.com/storage/images/Toyota/%D8%AA%D9%88%D9%8A%D9%88%D8%AA%D8%A7%20%D8%A7%D9%81%D8%A7%D9%86%D8%B2%D8%A7%201.jpg'
    WHEN 'Honda Brio' THEN 'https://img3.icarcdn.com/45417861/gallery_mobil-bekas-carmudi-honda-brio-satya-e-hatchback-indonesia_f7cb6773-a6f7-4362-9d4d-635b26ecaf33.jpeg?smia=xTM'
    WHEN 'Toyota Innova Reborn' THEN 'https://thumb.katadata.co.id/frontend/thumbnail/2025/10/14/zigi-68ee4a67b5553-innova-reborn_910_512.jpg'
    WHEN 'Honda Scoopy' THEN 'https://media.doanhnghiepvn.vn/Images/Uploaded/Share/2022/11/06/a39honda-scoopy-2023.jpg'
    ELSE image
END
WHERE name IN ('Honda Vario 160', 'Yamaha NMAX', 'Toyota Avanza', 'Honda Brio', 'Toyota Innova Reborn', 'Honda Scoopy');

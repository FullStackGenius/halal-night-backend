{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>
    body {
    font-family: "DejaVu Sans", sans-serif !important;
    direction: rtl;
    font-size: 22px;
}
    </style>

</head>
<body>

<h2>Font Test</h2>

<p>Arabic Test:</p>
<p>بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْم</p>

<p>Urdu Test:</p>
<p>یہ ایک ٹیسٹ ہے کہ کیا اردو فونٹ صحیح کام کر رہا ہے</p>

</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
       body {
        direction: rtl;
        text-align: right;
        font-family: 'scheherazade';
        font-size: 28px;
    }
    </style>
</head>
<body>
    <div class="arabic">
بِسْمِ اللَّهِ الرَّحْمٰنِ الرَّحِيمِ

</div>
   
    <p style="direction: ltr; font-family: Arial; font-size: 12pt; margin-top: 50px;">
        Invoice #{{ rand(1000,9999) }} | Date: {{ now()->format('d-m-Y')  }} {{storage_path('fonts')}}
    </p>
</body>
</html>
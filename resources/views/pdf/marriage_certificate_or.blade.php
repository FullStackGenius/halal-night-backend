{{-- <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Marriage Certificate</title>
  <style>
    body { font-family: DejaVu Sans, sans-serif; }
    .title { color: #B00020; text-align: center; font-size: 22px; font-weight: bold; }
    .section { margin: 30px 0; }
    .label { color: #B00020; font-weight: bold; }
  </style>
</head>
<body>
  <div class="title">Certificate of Islamic Marriage</div>
  <p>This certifies the marriage between <b>{{ $contract->husbandName }}</b> and <b>{{ $contract->wifeName }}</b>.</p>

  <div class="section">
    <div><span class="label">Mahr:</span> {{ $contract->mahr }}</div>
    <div><span class="label">Location:</span> {{ $contract->location }}</div>
    <div><span class="label">Start Date:</span> {{ $contract->startDate }}</div>
    <div><span class="label">Witness 1:</span> {{ $contract->witness1Name }}</div>
    <div><span class="label">Witness 2:</span> {{ $contract->witness2Name }}</div>
  </div>

  <p style="margin-top:50px;text-align:center;">Halal Night Organization</p>
</body>
</html> --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Marriage Certificate</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: #f8f7f3;
            margin: 40px;
            color: #333;
        }

        .certificate {
            border: 6px double #b08d57;
            padding: 30px 50px;
            background: #fffaf0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img.logo {
            width: 80px;
            margin-bottom: 10px;
        }

        .title {
            color: #8B0000;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 16px;
            color: #555;
        }

        .section {
            margin-top: 25px;
            line-height: 1.8;
        }

        .label {
            color: #8B0000;
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }

        .signatures {
            margin-top: 40px;
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .sign-box {
            width: 45%;
        }

        .sign-box img {
            height: 60px;
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }

        .seal {
            width: 100px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="header">
            @if (isset($logo_path) && file_exists($logo_path))
                <img src="{{ $logo_path }}" class="logo" alt="Logo">
            @endif
            <div class="title">Certificate of Islamic Marriage</div>
            <div class="subtitle">In the Name of Allah, the Most Gracious, the Most Merciful</div>
        </div>

        <p>This is to certify that the marriage between <b>{{ $contract->husbandName }}</b> and
            <b>{{ $contract->wifeName }}</b> has been solemnized in accordance with Islamic principles.
        </p>

        <div class="section">
            <div><span class="label">Mahr:</span> {{ $contract->mahr ?? 'N/A' }}</div>
            <div><span class="label">Duration:</span> {{ $contract->duration ?? 'N/A' }}</div>
            <div><span class="label">Start Date:</span> {{ $contract->startDate ?? 'N/A' }}</div>
            <div><span class="label">Location:</span> {{ $contract->location ?? 'N/A' }}</div>
            <div><span class="label">Conditions:</span> {{ $contract->conditions ?? 'N/A' }}</div>
            <div><span class="label">Witness 1:</span> {{ $contract->witness1Name ?? 'N/A' }}
                ({{ $contract->witness1Address ?? '' }})</div>
            <div><span class="label">Witness 2:</span> {{ $contract->witness2Name ?? 'N/A' }}
                ({{ $contract->witness2Address ?? '' }})</div>
        </div>

        <div class="signatures">
            <div class="sign-box">

                @if (!empty($contract->signature_husband))
                    <img src="{{ public_path('storage/uploads/' . $contract->signature_husband) }}"
                        alt="Husband Signature" alt="Husband Signature" style="width: 150px; border: 1px solid #ccc;">
                @endif
                <div>Signature of Husband</div>
            </div>

            <div class="sign-box">
                @if (!empty($contract->signature_wife))
                    <img src="{{ public_path('storage/uploads/' . $contract->signature_wife) }}" alt="Wife Signature">
                @endif
                <div>Signature of Wife</div>
            </div>
        </div>

        <div class="signatures">
            <div class="sign-box">
                @if (!empty($contract->signature_witness1))
                    <img src="{{ public_path('storage/uploads/' . $contract->signature_witness1) }}"
                        alt="Witness 1 Signature">
                @endif
                <div>Witness 1 Signature</div>
            </div>

            <div class="sign-box">
                @if (!empty($contract->signature_witness2))
                    <img src="{{ public_path('storage/uploads/' . $contract->signature_witness2) }}"
                        alt="Witness 2 Signature">
                @endif
                <div>Witness 2 Signature</div>
            </div>
        </div>

        <div class="footer">
            <p>Issued by <strong>Halal Night Organization</strong></p>
            {{-- @if (isset($contract->seal_path) && file_exists($contract->seal_path))
        <img src="{{ $contract->seal_path }}" class="seal" alt="Seal">
      @endif --}}
            <p>Date of Issue: {{ now()->format('F d, Y') }}</p>
        </div>
    </div>

</body>

</html>

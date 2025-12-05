<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarriageContract extends Model
{
    protected $fillable = [
        'husbandName',
        'wifeName',
        'mahr',
        'duration',
        'startDate',
        'location',
        'conditions',
        'witness1Name',
        'witness1Address',
        'witness2Name',
        'witness2Address',
        'consent',
        'signature_husband',
        'signature_wife',
        'signature_witness1',
        'signature_witness2',
        'certificate'
    ];

    // 👇 Auto-append these when converting to JSON
    protected $appends = [
        'signature_husband_url',
        'signature_wife_url',
        'signature_witness1_url',
        'signature_witness2_url',
        'certificate_url',
        'signature_husband_base64',
        'signature_wife_base64'

    ];

    // 🔹 Accessor for Husband Signature URL
    public function getSignatureHusbandUrlAttribute()
    {
        if (!empty($this->signature_husband)) {
            return asset('storage/uploads/' . $this->signature_husband);
        }
        return null;
    }

    // 🔹 Accessor for Wife Signature URL
    public function getSignatureWifeUrlAttribute()
    {
        if (!empty($this->signature_wife)) {
            return asset('storage/uploads/' . $this->signature_wife);
        }
        return null;
    }

    // 🔹 Accessor for Witness 1 Signature URL
    public function getSignatureWitness1UrlAttribute()
    {
        if (!empty($this->signature_witness1)) {
            return asset('storage/uploads/' . $this->signature_witness1);
        }
        return null;
    }

    // 🔹 Accessor for Witness 2 Signature URL
    public function getSignatureWitness2UrlAttribute()
    {
        if (!empty($this->signature_witness2)) {
            return asset('storage/uploads/' . $this->signature_witness2);
        }
        return null;
    }

    // 🔹 Accessor for Certificate URL
    public function getCertificateUrlAttribute()
    {
        if (!empty($this->certificate)) {
            return asset('storage/certificates/' . $this->certificate);
        }
        return null;
    }
    public function getSignatureHusbandBase64Attribute()
    {
        if (!$this->signature_husband) {
            return null;
        }

        $path = storage_path('app/public/uploads/' . $this->signature_husband);

        if (!file_exists($path)) {
            return null;
        }

        return 'data:image/png;base64,' . base64_encode(file_get_contents($path));
    }

      public function getSignatureWifeBase64Attribute()
    {
        if (!$this->signature_wife) {
            return null;
        }

        $path = storage_path('app/public/uploads/' . $this->signature_wife);

        if (!file_exists($path)) {
            return null;
        }

        return 'data:image/png;base64,' . base64_encode(file_get_contents($path));
    }
}

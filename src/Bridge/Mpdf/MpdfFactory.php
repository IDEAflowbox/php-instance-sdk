<?php

namespace App\Bridge\Mpdf;

use Mpdf\Mpdf;

class MpdfFactory
{
    public function __construct(
        private string $tempDir
    ) {
    }

    public function __invoke(): Mpdf
    {
        return new Mpdf(
            ['tempDir' => $this->tempDir]
        );
    }
}

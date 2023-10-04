<?php

namespace App\Http\Controllers;

use TCPDF;
use Dompdf\Dompdf;

use App\Models\Client;
use App\Models\Paiement;
use App\Models\Abonnement;
use App\Models\CouponAbonnement;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Symfony\Component\HttpFoundation\Response;

class PDFController extends Controller
{

  public function RapportClientsPDF($id_paiement)
  {

    $paiement = Paiement::find($id_paiement);

    if ($paiement) {
      $abonnement = Abonnement::find($paiement->id_abonnement);

      if ($abonnement) {
        $coupon = CouponAbonnement::where(['id_paiement' => $id_paiement])->first();
      } else {
        $coupon = null;
      }
    } else {
      $abonnement = null;
      $coupon = null;
    }

    $client = auth()->user();

    $imagePath = public_path() . '\assets\img\logopdf10.jpg';
    $imageData = base64_encode(file_get_contents($imagePath));
    $imageSrc = 'data:image/jpeg;base64,' . $imageData;

    $data = [
      'paiement' => $paiement,
      'abonnement' => $abonnement,
      'coupon' => $coupon,
      'client' => $client,
      'imgSrc' => $imageSrc
    ];

    $html = view('pdf', $data)->render();



    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    return new Response(
      $dompdf->stream('pdf.pdf', ['Attachment' => false]),
      200,
      [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'attachment; filename="pdf.pdf"',
      ]
    );
  }
}
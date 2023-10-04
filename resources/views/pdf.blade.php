<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      border-spacing: 0;
    }

    th,
    td {
      border: none;
      padding: 8px;
    }

    .nav-container {
      display: grid;
      grid-template-columns: auto 1fr;
      grid-gap: 10px;
      align-items: center;
      padding: 10px;
    }

    ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      align-items: center;
    }

    li {
      padding: 10px;
      line-height: 1;
    }

    .logo img {
      width: 100px;
      height: auto;
      float: right;
    }

    .encadrement {
      border-collapse: collapse;
      /* Fusionne les bordures intérieures du tableau */
      border: 2px solid black;
      /* Définit une bordure solide de 2 pixels en noir */
    }
  </style>
</head>

<body>
  <div class="nav-container">
    <ul>
      <li>Année: {{date('Y')}}</li>
      <li>Compagnie: ByBus</li>
      <li>E-mail: bybus@gmail.com</li>
    </ul>
    <div class="logo">
      <img src="{{ $imgSrc }}" alt="Logo" style="width: 200px; height: 200px;position: relative; top: -150px;left:20px;">
    </div>
  </div>

  <table>
    <tr>
      <td style="vertical-align: top;">
        <h3 style="color:purple;">Détail de paiement</h3>
        <table class="encadrement">
          <tbody>
            <tr>
              <td>Date de paiement:</td>
              <td>{{$paiement->created_at}}</td>
            </tr>
            <tr>
              <td>N° de paiement:</td>
              <td>{{$paiement->id}}</td>
            </tr>
            <tr>
              <td>Méthode de paiement:</td>
              <td>{{$paiement->methodePaiment}}</td>
            </tr>
            <tr>
              <td>Code Paiement:</td>
              <td>{{$coupon->code}}</td>
            </tr>
            <tr>
              <td>Montant payé:</td>
              <td style="color:red;">{{$paiement->montant}}MAD</td>
            </tr>
            
          </tbody>
        </table>
      </td>
      <td style="vertical-align: top;">
        <h3 style="color:purple;">Détail d'abonnement</h3>
        <table class="encadrement">
          <tbody>
            <tr>
              <td>Abonnement :</td>
              <td>{{$abonnement->nom}}</td>
            </tr>
            <tr>
              <td>N° d'abonnement :</td>
              <td>{{$abonnement->id}}</td>
            </tr>
            <tr>
              <td>Trajet :</td>
              <td>{{$abonnement->trajet}}</td>
            </tr>
            <tr>
              <td>Départ et destination:</td>
              <td>{{$abonnement->depart}}-{{$abonnement->destination}}</td>
            </tr>
            <tr>
              <td>Entreprise couvrante:</td>
              <td>{{$abonnement->entreprises->nom}}</td>
            </tr>

          </tbody>
        </table>
      </td>
    </tr>
    



    <tr>
      <td style="vertical-align: top;">
        <h3 style="color:purple;">Informations Client</h3>
        <table class="encadrement">
          <tbody>
            <tr>
              <td>Nom:</td>
              <td>{{$client->nom}}</td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td>{{$client->email}}</td>
            </tr>
            <tr>
              <td>N° telephone:</td>
              <td>{{$client->telephone}}</td>
            </tr>
            <tr>
              <td>Ville</td>
              <td>{{$client->adresse}}</td>
            </tr>
          </tbody>
        </table>
      </td>

      <input type="hidden" id="text" value="{{$coupon->code}}">
      <div class="d-flex  d-none d-lg-flex flex-column align-items-center">
        <div class="qrCode mt-3" id="qrcode"></div>
      </div>


  </table>


  <div class="qrCode mt-3" id="qrcode"></div>
  </div>
 
</body>

</html>
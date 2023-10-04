<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Client extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'adresse',
        'password',
        'imgPath'
    ];

    public function entreprises() :HasManyThrough
    {
        return $this->hasManyThrough(
            Entreprise::class,
            ClientEntreprise::class,
            'id_client', // clé étrangère dans la table clientEntreprise qui correspond à l'ID du client
            'id', // clé primaire dans la table entreprises
            'id', // clé primaire dans la table clients
            'id_entreprise' // clé étrangère dans la table clientEntreprise qui correspond à l'ID de l'entreprise
        );
    }

    
    public function otpCode(): HasOne
    {
        return $this->hasOne(OtpCode::class, 'client_id');
    }

    public function notes_commentaires(): HasMany
    {
        return $this->hasMany(NotesCommentaire::class, 'id_client');
    }

    public function exprimer_abonnements(): HasMany
    {
        return $this->hasMany(ExprimerAbonnement::class, 'id_client');
    }

    public function comptes(): HasMany
    {
        return $this->hasMany(Compte::class, 'id_client');
    }

    public function abonnements() :hasManyThrough
    {
        return $this->hasManyThrough(
            Abonnement::class,
            Paiement::class,
            'id_client', // clé étrangère dans la table paiements qui correspond à l'ID du client
            'id', // clé primaire dans la table abonnements
            'id', // clé primaire dans la table clients
            'id_abonnement' // clé étrangère dans la table paiements qui correspond à l'ID de l'abonnement
        );
    }


    public function clientAbonnements(): HasMany{
        return $this->hasMany(ClientAbonne::class, 'id_client');
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }


}

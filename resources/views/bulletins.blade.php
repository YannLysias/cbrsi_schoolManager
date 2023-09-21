<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin</title>
    <link rel="stylesheet" href="/css/Bulletin.css">
</head>
<body>

<div class="header">
    <div class="left-content">
      <div align="center">  MINISTERE DES ENSEIGNEMENTS SECONDAIRE <br>
        TECHNIQUE ET DE LA FORMATION PROFESSIONNEL <br>
        REPUBLIQUE DU BENIN
      </div>
    </div>
    <img src="/img/logoP.png" alt="Logo" class="logo">
    <div class="right-content">
        <p>2022-2023</p>
         <h3>CEG 1 LOKOSSA</h3>
         <p><b>lokoassaceg1@gmail.com BP:04 Lokossa</b></p>
    </div>
</div>
<div class="content">
    <b>BULLETIN DE NOTES DU DEUXIEME SEMESTRE</b>
</div>

 <!---------------------- Ajoutez plus d'options si nécessaire ------------------------>
<form>
    <div class="form-group">
    <div class="form-group">
        <label for="nom">Nom & Prenoms :</label>
        {{$eleve->utilisateur->nom." ".$eleve->utilisateur->prenom }}
    </div>

    <div>

        <img src="/img/{{$eleve->utilisateur->photo}}" width="100" height="100" alt="photo" class="logo">
    </div>

    <div class="flex-container">
        <div class="form-group">
            <label for="classe">Classe</label>
            {{$eleve->Salle->nom}}
        </div>
            <!--
        <div class="form-group">
            <label for="effectif" align="center">Effectif:</label>
            <select id="effectif">
                <option value="effectif1">Effectif 1</option>
                <option value="effectif2">Effectif 2</option>

            </select>
        </div>
       -->
    </div>

    <div class="flex-container">
        <div class="checkbox-group">

            <div>
            <label for="fille">Sexe</label>
            {{$eleve->utilisateur->sexe}}
            </div>

        </div>

        <div class="form-group">
            <label for="id" align="center">educMaster ID:</label>
            {{$eleve->numEduMaster}}
        </div>
         </div>

    </div>
</form>
<div class="container">
    <table>
    <tr>
        <th rowspan="2">Matières</th>
        <th rowspan="2">Moy Interro</th>
        <th rowspan="2">Devoir1</th>
        <th rowspan="2">Devoir2</th>
        <th rowspan="2">Moye20</th>
        <th rowspan="2">Coef</th>
        <th rowspan="2">MoyCoef</th>
        <th colspan="3" class="mid">Moyennes de classe </th>
        <th rowspan="2" width="60%"  class="mid" >Appréciation du Professeur </th>

    </tr>
    <tr>
        <th>Moyenne </th>
        <th>Plus faible</th>
        <th>Plus forte</th>
    </tr>
    @foreach ($matieres as $matiere)
      <tr>
        <td>{{$matiere->nom}}</td>
        <td>{{ $moyennes[$matiere->id] }}</td>
        <td>{{ isset($matiere->devoirs[0]) ? $matiere->devoirs[0]->valeur : "Néant"	}}</td>
        <td>{{ isset($matiere->devoirs[1]) ? $matiere->devoirs[1]->valeur : "Néant"	}}</td>
        <td></td>
        <td>{{$matiere->coef}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    @endforeach

      <tr >
        <td colspan="4"></td>
        <td>Total</td>
        <td></td>
        <td></td>
        <td colspan="4" style="text-align: center;">Appréciation du Chef d'Etablissement </td>
      </tr>
      <tr >
        <td colspan="11">
          <span style="padding-left: 15px;">Moyenne Semestrielle</span> : <b>Moy</b>
          <span style="padding-left: 30px;">Rang</span> : <b>Rng</b>
          <b style="padding-left:50%;">Mention</b>

        </td>
      </tr>
      <tr>
        <td colspan="11">
            <p align="center">Eléments d'analyse du résultat de l'éleve :</p>
          <div class="table-container">
            <table>
              <tr>
                <td>Compétence Littéraire</td>
                <td>Moy</td>
              </tr>
              <tr>
                <td>Compétence Scientifique</td>
                <td>Moy</td>
              </tr>
              <tr>
                <td>Autre Compétence</td>
                <td>Moy</td>
              </tr>
            </table>
          </div>
          <div class="table-container">
            <table>
              <tr>
                <td>Meilleure Moyenne</td>
                <td>Moy</td>
              </tr>
              <tr>
                <td>Moyenne de Classe</td>
                <td>Moy</td>
              </tr>
              <tr></tr>
                <td>Plus Faible Moyenne </td>
                <td>Moy</td>
              </tr>
            </table>
          </div>
          <div class="table-container">
            <table>
              <tr>
                <td style="width: 20px;" colspan="2">Total des Moyennes supérieures ou égales à 10 : soit </td>
              </tr>
                <td>Total des moyennes inférieures à 10</td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr >
        <td colspan="11">
          <span style="padding-left: 15px;">Moyenne du 1er semestre</span> : <b>Moy</b>
          <span style="padding-left: 30px;">Rang</span> : <b>Rng</b>
          <b style="padding-left:50%;">soit une regression de </b>

        </td>
      </tr>
      <tr >
        <td colspan="11">
          <span style="padding-left: 15px;">Moyenne Annuelle </span> : <b>Moy</b>
          <span style="padding-left: 30px;">Rang</span> : <b>Rng</b>
          <b style="padding-left:50%;">Mention</b><br><br>
          <span style="margin-left: 50px;" align="center">Professeur Principal</span>
          <span><u style="margin-right:250px ; margin-left: 200px;">Décision du conseil des Professeurs</u></span>
          <span>Le Directeur</span> <br><br><br><br>
          <span style="margin-left: 50px;" align="center">Nom Prénoms</span>
          <span style="margin-right:400px ; margin-left:300px; margin-bottom: 100px;">Décision</u></span>
          <span>Nom Prénoms</span> <br>
        </td>
      </tr>
    </table>
  </div>

</body>
</html>

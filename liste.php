<!DOCTYPE html>
<html lang="fr">
<?php require_once '../../../sections/admin/head.php'; ?>

   <style>

        :root{
            --bg: #0A0A0A;
            --card: #121212;
            --card-hover: #1A1A1A;
            --border: #222222;
            --text: #FFFFFF;
            --text-muted: #A0A0A0;
            --primary: #FFFFFF;
            --success: #2E7D32;
            --warning: #C29B38;
            --danger: #D32F2F;
            --shadow: 0 20px 40px rgba(0,0,0,0.7);
        }

        body{
            background: var(--bg) !important;
            color: var(--text) !important;
            font-family: 'Inter', sans-serif;
        }

        .panel.panel-inverse{
            background: var(--card) !important;
            border: 1px solid var(--border) !important;
            border-radius: 12px !important;
            overflow: hidden;
            box-shadow: var(--shadow) !important;
        }

        .panel-heading{
            background: #161616 !important;
            border-bottom: 1px solid var(--border) !important;
            padding: 15px 20px !important;
        }

        .panel-title{
            color: var(--text) !important;
            font-weight: 600 !important;
            letter-spacing: -0.5px;
        }

        .page-header{
            color: var(--text) !important;
            font-size: 32px !important;
            font-weight: 700 !important;
            letter-spacing: -1px;
            margin-bottom: 25px;
        }

        #data-table-default{
            background: transparent !important;
        }

        #data-table-default thead th{
            background: #161616 !important;
            color: var(--text-muted) !important;
            border-color: var(--border) !important;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 1.5px;
            font-weight: 600;
            padding: 15px !important;
        }

        #data-table-default tbody td{
            background: var(--card) !important;
            color: var(--text) !important;
            border-color: var(--border) !important;
            padding: 15px !important;
        }

        #data-table-default tbody tr:hover{
            background: var(--card-hover) !important;
        }

        .product-img img{
            width: 45px;
            height: 45px;
            border-radius: 8px;
            border: 1px solid var(--border);
            object-fit: cover;
        }

        /* Badges Catégories */
        .badge-category {
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 500;
        }
        .cat-tissu { background: rgba(255, 255, 255, 0.08); color: #FFF; border: 1px solid rgba(255, 255, 255, 0.2); }
        .cat-alimentaire { background: rgba(46, 125, 50, 0.15); color: #81C784; border: 1px solid rgba(46, 125, 50, 0.3); }
        .cat-bio { background: rgba(0, 150, 136, 0.15); color: #4DB6AC; border: 1px solid rgba(0, 150, 136, 0.3); }
        .cat-artisanat { background: rgba(194, 155, 56, 0.15); color: #E0B858; border: 1px solid rgba(194, 155, 56, 0.3); }

        /* Stock Status */
        .stock-status {
            font-weight: 600;
            font-size: 13px;
        }
        .stock-ok { color: #2E7D32; }
        .stock-low { color: #C29B38; }
        .stock-out { color: #D32F2F; }

        .btn-success{
            background: var(--primary) !important;
            border: none !important;
            color: #000000 !important;
            font-weight: 600 !important;
            border-radius: 8px !important;
            padding: 8px 16px !important;
        }

        .btn-warning, .btn-danger{
            border: none !important;
            border-radius: 8px !important;
        }

        .form-control, .form-select{
            background: #161616 !important;
            border: 1px solid var(--border) !important;
            color: var(--text) !important;
            border-radius: 8px !important;
            padding: 10px 15px !important;
        }

        .form-control:focus, .form-select:focus{
            border-color: #444444 !important;
            box-shadow: none !important;
            color: var(--text) !important;
        }

        .modal-content{
            background: var(--card) !important;
            border: 1px solid var(--border) !important;
            border-radius: 16px !important;
        }
    </style>

<body>
    <div id="page-container" class="fade show page-sidebar-fixed page-header-fixed">

     <!-----=================================Menu haut===============================----->
        <?php require_once '../../../sections/admin/menu_haut.php'; ?>

     <!-----=================================Menu gauche===============================----->
        <?php require_once '../../../sections/admin/menu_gauche.php'; ?>


     <!-- ================== Base content ================== -->
        <div id="content" class="content">
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="#" class="btn btn-sm btn-warning">Dashboard</a></li>
                <li class="breadcrumb-item">
                    <a href="#modal-produit" class="btn btn-sm btn-success" data-toggle="modal">Ajouter un produit</a>
                </li>
            </ol>
            
            <h1 class="page-header"># Catalogue Produits</h1>
            
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Gestion des articles du marché</h4>
                </div>
                
                <div class="panel-body">
                    <table id="data-table-default" class="table table-td-valign-middle">
                        <thead>
                            <tr>
                                <th width="1%">ID</th>
                                <th width="1%" data-orderable="false">Image</th>
                                <th>Désignation</th>
                                <th>Catégorie</th>
                                <th>Producteur / GIE</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th width="10%" data-orderable="false">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="product-img"><img src="public/assets/img/produits/bazin.jpg" alt="" onerror="this.src='https://placehold.co/45x45/161616/FFFFFF?text=Tissu'"></td>
                                <td><strong>Bazin Riche Teint</strong><br><small class="text-muted">Gagnila Qualité Supérieure</small></td>
                                <td><span class="badge-category cat-tissu">Tissus & Mode</span></td>
                                <td>GIE Ninki Nanka</td>
                                <td><strong>45 000 FCFA</strong></td>
                                <td class="stock-status stock-ok">12 dispo</td>
                                <td>
                                    <a href="#modal-produit" data-toggle="modal" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="product-img"><img src="public/assets/img/produits/beurre-karite.jpg" alt="" onerror="this.src='https://placehold.co/45x45/161616/FFFFFF?text=Bio'"></td>
                                <td><strong>Beurre de Karité Pur</strong><br><small class="text-muted">Pot de 500g</small></td>
                                <td><span class="badge-category cat-bio">Soins & Cosmétiques</span></td>
                                <td>Sunu Bio Soins</td>
                                <td><strong>4 500 FCFA</strong></td>
                                <td class="stock-status stock-low">2 restants</td>
                                <td>
                                    <a href="#modal-produit" data-toggle="modal" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td class="product-img"><img src="public/assets/img/produits/miel.jpg" alt="" onerror="this.src='https://placehold.co/45x45/161616/FFFFFF?text=Agri'"></td>
                                <td><strong>Miel Pur de Casamance</strong><br><small class="text-muted">Bouteille de 1L</small></td>
                                <td><span class="badge-category cat-alimentaire">Produit Agricole</span></td>
                                <td>Le Jardin de Casamance</td>
                                <td><strong>7 000 FCFA</strong></td>
                                <td class="stock-status stock-out">Rupture</td>
                                <td>
                                    <a href="#modal-produit" data-toggle="modal" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

	 <!-- ================== Modal Ajouter ================== -->
        <div class="modal fade" id="modal-produit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Fiche Article / Produit</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action=">
                            <div class="form-group mb-3 >
                                <label class="mb-2">Nom du produit</label>
                                <input type="text" class="form-control" placeholder="Ex: Huile de Baobab" required />
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label class="mb-2">Catégorie</label>
                                    <select class="form-control">
                                        <option>Tissus & Mode</option>
                                        <option>Produit Agricole / Agroalimentaire</option>
                                        <option>Soins & Cosmétiques Bio</option>
                                        <option>Artisanat & Perles</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label class="mb-2">Producteur associé</label>
                                    <select class="form-control">
                                        <option>GIE Ninki Nanka</option>
                                        <option>Le Jardin de Casamance</option>
                                        <option>Sunu Bio Soins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label class="mb-2">Prix de vente (FCFA)</label>
                                    <input type="number" class="form-control" placeholder="Ex: 5000" required />
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label class="mb-2">Quantité en Stock</label>
                                    <input type="number" class="form-control" placeholder="Ex: 20" required />
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Image du produit</label>
                                <input type="file" class="form-control" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Description / Détails</label>
                                <textarea class="form-control" rows="3" placeholder="Caractéristiques, composants, dimensions..."></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Annuler</a>
                        <a href="javascript:;" class="btn btn-success">Enregistrer l'article</a>
                    </div>
                </div>
            </div>
        </div>

        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    </div>

    <!-- ================== Scripts JS ================== -->
    <?php require_once '../../../sections/admin/script.php'; ?>
</body>
</html>
<?php

$articles = ["Chaussettes", "T-shirts", "Chaussures", "Pull", "Pantalon"];

$qté = [10, 5, 8, 3, 12];

$qtéVente = [0, 0, 0, 0, 0];

echo "\nBienvenue dans notre magasin !";

$action = readline("\nQue voulez vous faire (1 Acheter, 2 Réapprovisionner, 3 Supprimer un article) : ");

if($action == 1)
{
    echo "\nQue voulez vous achetez voici nos stock :\n";

    foreach($articles as $i => $article)
    {
        if($qté[$i] == 0)
        {
            $nb = "Rupture de";
        }

        else
        {
            $nb = $qté[$i];
        }

        echo $nb . ":" . $article . " | ";
    }

    $achatArt = 0;

    echo "\n\n";

    while($achatArt <= 0 or $achatArt > count($articles))
    {
        echo "🛍️ Saisissez l'article désirez ( |";
        for($i = 1; $i <= count($articles); $i++)
        {
            echo "$i:" . $articles[$i-1] . " | ";
        }
        $achatArt = readline(") : ");
    }

    $achatQté = 0;

    while($achatQté > $qté[$achatArt-1] or $achatQté <= 0)
    {
        $achatQté = readline("🛍️ Saisissez la quantité désirez (Attention a la quantité) : ");
    }

    echo "🛍️ Vous avez acheté $achatQté " . $articles[$achatArt-1];
    
    $qté[$achatArt-1] -= $achatQté;

    $qtéVente[$achatArt-1] += $achatQté;

    echo "\n";
}

else if($action == 2)
{
    $restockArt = 0;

    echo "\n";

    while($restockArt <= 0 or $restockArt > 5)
    {
        echo "🛍️ Saisissez l'article désirez réapprovisionner ( |";
        for($i = 1; $i <= count($articles); $i++)
        {
            echo "$i:" . $articles[$i-1] . " | ";
        }
        $restockArt = readline(") : ");
    }

    $restockQté = 0;

    while($restockQté <= 0)
    {
        $restockQté = readline("🔄 Quel quantité de " . $articles[$restockArt-1] . " vas entrer en stock ? : ");
    }

    echo "🔄 Vous avez rajoutez $restockQté " . $articles[$restockArt-1];
    
    $qté[$restockArt-1] += $restockQté;

    echo "\n";
}

else if($action == 3)
{
    $supArt = 0;

    while($supArt <= 0 or $supArt > 5)
    {
        echo "🛍️ Saisissez l'article désirez réapprovisionner ( |";
        for($i = 1; $i <= count($articles); $i++)
        {
            echo "$i:" . $articles[$i-1] . " | ";
        }
        $supArt = readline(") : ");
    }

    echo "Etes vous sur de vouloir supprimé " . $articles[$supArt-1];
    
    $confirmationSup = readline(" des stocks ? (Y/N) : ");

    if (strtolower($confirmationSup) == "y")
    {
        unset($articles[$supArt-1]);
        unset($qté[$supArt-1]);
        unset($qtéVente[$supArt-1]);
    }
}

else
{
    echo "Action inconnue fin de programme";
}

echo "\n";

echo "🔄 Voici les nouveaux stock :\n";

foreach($articles as $i => $article)
{
    if($qté[$i] == 0)
    {
        $nb = "Rupture de";
    }

    else
    {
        $nb = $qté[$i];
    }

    echo $nb . ":" . $article . " | ";
}

echo "\n\n";

echo "🛍️ Voici le Tableau des ventes :\n";

foreach($articles as $i => $article)
{
    $nb = $qtéVente[$i];

    echo $nb . ":" . $article . " | ";
}
<!DOCTYPE html>
<html>

<head>
    <title>Översättning Resultat</title>
    <meta charset="utf-8">
</head>

<body>
    <?php
	
        // Inga konstigheter här
        $svenska = array ("hund", "vatten", "katt", "bröd", "kaffe", "pojke", "äpple", "lingon", "häst", "jacka");
		$engelska = array("dog", "water", "cat", "bread", "coffee", "boy", "apple", "lingon-berry", "horse", "jacket");
        // Glöm inte att fylla i de här tre innan du lämnar in
        $spanska = array("", "", "", "", "", "", "", "", "", "");
        $tyska = array("", "", "", "", "", "", "", "", "", "");
        $arabiska = array("", "", "", "", "", "", "", "", "", "");

        // Okej, försöker förklara vad jag gör från nu då.

        // Vi börjar med att kolla så att formuläret har skickats genom att kolla efter variabeln valtOrd
        if (isset($_GET['valtOrd'])) {
            // Är vi här inne så har formuläret skickats.

            // Flyttar ner grejen där ni skapar de lokala variablerna hit så de bara körs om formuläret postats.
            $word = $_GET['valtOrd'];
            $language = $_GET['language'];

            // Vi kan väl börja med att kolla att ordet som ska översättas är med i arrayen $svenska
            // ! gör att den kollar om påståendet INTE är sant
            if (!in_array($word, $svenska)) {
                echo ("Du angav ett ord som jag inte kan översätta. <a href=\"oversattare_formular.htm\">Försök igen.</a>");
                // Dö här så ingen mer kod körs.
                die();
            }

            // Okej, vi vet nu att det finns ett ord som vi kan översätta så let's översätt

            // Tänker att vi börjar med att kolla vilken position i arrayen svenska ordet har.
            // (Kom ihåg att arrayer börjar på 0, inte 1.)
            $plats_i_array = array_search($word, $svenska);

            // Vi vet vilket språk vi ska översätta till, det finns i variablen $language så vi kan använda det
            // för att dynamiskt slå upp vilket ord som finns på samma position i motsvarande array för det språket
            $oversattning = ${$language}[$plats_i_array];
            
            // Och så kör vi ett trevligt meddelande till användaren.
            echo("Översättningen av ordet <strong>$word</strong> till <strong>$language</strong> är <strong>$oversattning</strong>.");
            echo("<br><br><a href=\"oversattare_formular.htm\">Översätt ett nytt ord?</a>");
            
        } else {
            // Är vi här så har formuläret inte skickats så vi kan väl säga något om det I guess
            echo ("Du måste gå till <a href=\"oversattare_formular.htm\">formuläret</a> och starta därifrån.");
        }

    ?>

</body>

</html>

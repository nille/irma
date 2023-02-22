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

        // Vi börjar med att kolla så att formuläret har skickats genom att kolla efter variabeln $valtOrd.
        if (isset($_GET['valtOrd'])) {
            // Är vi här inne så har formuläret skickats.

            // Flyttar ner grejen där ni skapar de lokala variablerna hit så de bara körs om formuläret postats.
            // På så sätt slipper vi onödiga varningar om variabler som inte finns pga är vi här så finns de.
            $word = $_GET['valtOrd'];
            $language = $_GET['language'];

            // Vi kan väl börja med att kolla att ordet som ska översättas är med i arrayen $svenska.
            // Vi behöver också en liten variabel för att hålla reda på vilken numerisk omgång vi är i 
            // foreach-loopen.
            // Vi skapar variabeln $plats_i_array utanför och sätter den till 0
            $plats_i_array = 0;

            // Nu loopar vi igenom arrayen svenska för att kolla så att vi ens har ordet med i listan över ord vi kan 
            // översätta.
            foreach ($svenska as $ord) {
                if ($ord == $word) {
                    // Är vi här inne så kan vi översätta ordet då det finns med i arrayen $svenska
                    // Vi vet också på vilken position i arrayen med hjälp av $plats_i_array.

                    // Vi vet vilket språk vi ska översätta till, det finns i variablen $language så vi kan använda det
                    // för att dynamiskt slå upp vilket ord som finns på samma position i motsvarande array för det språket.
                    $oversattning = ${$language}[$plats_i_array];

                // Och så kör vi ett trevligt meddelande till användaren.
                echo("Översättningen av ordet <strong>$word</strong> till <strong>$language</strong> är <strong>$oversattning</strong>.");
                echo("<br><br><a href=\"oversattare_formular.htm\">Översätt ett nytt ord?</a>");

                // Och så un-alivear vi oss själva så ingen onödig kod körs efter detta.
                die();
                }
                // Ingen match i denna loop-snurra.
                // Vi måste därmed försöka igen och då även öka $plats_i_array med +1.
                // Man kan även skriva detta som: $plats_i_array++; vilket är ett snyggare sätt att göra samma sak
                // men vi håller det enkelt och tydligt här och kör så här:
                $plats_i_array = $plats_i_array +1;
            
                
            }

            // Har vi hamnat här så har vi hamnat här så hade vi inte ordet i arrayen $svenska och kan därmed inte översätta det.
            echo ("Sorry, kan inte översätta <strong>$word</strong>.<br><br>Du måste gå till <a href=\"oversattare_formular.htm\">formuläret</a> och prova med ett ord jag kan översätta.");
            
        } else {
            // Är vi här så har formuläret inte skickats så vi kan väl säga något om det I guess
            echo ("Du måste gå till <a href=\"oversattare_formular.htm\">formuläret</a> och starta därifrån.");
        }

    ?>

</body>

</html>

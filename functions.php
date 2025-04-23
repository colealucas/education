<?php
/**
 * education functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package education
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

include_once('inc/enqueue-assets.php');
include_once('inc/connect-acf.php');
include_once('inc/cleaner.php');
include_once('inc/theme-setup.php');
include_once('inc/theme-functions.php');
include_once('inc/cpt.php');

add_action('init', 'populate_notions_repeater');

function populate_notions_repeater() {
    // Use the known page ID directly
    $post_id = 1625; // Replace 123 with the actual page ID

    // Avoid re-inserting if data already exists
    if (have_rows('notions', $post_id)) return;

    // Your vocabulary data
    $vocabulary_data = [
        [
            'assign_letter' => 'a',
            'notion' => 'Actor/actriță',
            'description' => 'persoană care joacă un rol într-un film, pe scenă sau într-o producție televizată.',
        ],
        [
            'assign_letter' => 'a',
            'notion' => 'Adresă electronică',
            'description' => 'adresă utilizată pentru transmiterea mesajelor în spațiul online, alcătuită în numele utilizatorului/utilizatoarei sau username și site-ul pe care se creează adresa de e-mail sau gazda.',
        ],
        [
            'assign_letter' => 'a',
            'notion' => 'Animator/animatoare',
            'description' => 'persoană care realizează animații prin desene sau utilizând computerul, pentru a crea filme de animație.',
        ],
        [
            'assign_letter' => 'a',
            'notion' => 'Animație',
            'description' => 'proces de filmare a mișcării succesive a imaginii într-un film de animație.',
        ],
        [
            'assign_letter' => 'a',
            'notion' => 'Articol',
            'description' => 'material publicistic în care autorul/ autoarea expune informații cu caracter politic, social științific ș.a. De mai mici sau mai mari dimensiuni, un articol prezintă punctul de vedere al redacției (articol de fond), anumite principii (articol-program, apărut în primul număr al unei publicații noi) sau dezvoltă un subiect fie în formă de știre, fie în formă de reportaj. Articolul poate avea un caracter descriptiv sau analitic.',
        ],
        [
            'assign_letter' => 'a',
            'notion' => 'Audiență',
            'description' => 'receptivitate. Un post de radio poate avea o mare a audiență (mulți ascultători interesați). "A avea audiență" înseamnă a fi bine primit de public. În audiovizual – numărul de ascultători/ascultătoare sau telespectatori/telespectatoare care urmăresc un canal mediatic.',
        ],
        [
            'assign_letter' => 'a',
            'notion' => 'Audioconferință',
            'description' => 'modalitate virtuală de comunicare prin care se realizează schimbul instant de informații pe cale auditivă, folosind mijloace precum telefonul.',
        ],
        [
            'assign_letter' => 'a',
            'notion' => 'Audiovizual',
            'description' => 'mijloc de informare și comunicare care se bazează pe perceperea auditivă și vizuală (radio și televiziune).',
        ],
        [
            'assign_letter' => 'b',
            'notion' => 'Blog',
            'description' => 'pagină web, de obicei menținută de către o persoană, pe care aceasta publică în mod regulat comentarii, descrie evenimente și păstrează dialogul cu cititorii/ cititoarele. Termenul a fost inventat în 1999 și este o prescurtare de la "web log". Dacă este foarte personal, blogul seamănă cu un jurnal personal online, iar dacă reprezintă autorul/autoarea în calitate de angajat/angajată al/a unei organizații media – cu un jurnal deschis. Cea mai importantă postare apare prima.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Carte electronică (e-book)',
            'description' => 'echivalent digital ("electronic book") al unei cărți tipărite pe suport de hârtie. Fișierul electronic digital conține textul și imaginile unei cărți, iar uneori chiar clipuri video. Se poate citi pe computer (folosind un CD-Rom), pe ecranul unora dintre telefoanele mobile sau pe dispozitive speciale de lectură (e-reader), stabile ori portabile, precum și pe internet.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Chat',
            'description' => 'metodă de comunicare virtuală prin care se face schimb instant de informații.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Cinefil/cinefilă',
            'description' => 'persoană amatoare de filme care frecventează des spectacole cinematografice.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Clip',
            'description' => 'suită de imagini multimedia, de animație sau film video cu rol ilustrativ, publicitar etc., difuzată pe o secvență de scurtă durată. Clipul poate însoți o melodie sau poate fi o reclamă.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Computer',
            'description' => 'aparat electronic dotat cu memorie și cu multiple mijloace de analiză și prelucrare a informației.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Comunicare de masă',
            'description' => 'orice formă de comunicare în care mesajele, având un caracter public, se adresează unei largi audiențe, într-un mod indirect și unilateral, utilizându-se o tehnologie de difuzare. Astăzi, caracterul unilateral este diminuat prin încercarea de a susține o relație de interacțiune între cele două părți prin feedback. (Van Cuilenburg. Știința comunicării. București, 1998)',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Comunicare mediată',
            'description' => 'comunicare realizată prin telefon, calculator, tabletă ca instrumente de mediere, între grupuri de oameni mai puțin numeroase. Această formă de comunicare se numește și virtuală și poate fi de mai multe tipuri: video +audio sau videoconferința; audio conferința; chatul; emailul.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Consolă de jocuri',
            'description' => 'tip de calculator interactiv, destinat exclusiv jocurilor virtuale. Consum mediatic – cantitate de informație primită și timpul de interacțiune petrecut de o persoană în spațiul media.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Controllerul',
            'description' => 'element important al consolei cu ajutorul căruia utilizatorul/utilizatoarea dă comenzi și interacționează cu obiectele de pe ecran.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Critic de film',
            'description' => 'persoană care scrie despre filme, la scurt timp după apariția acestora, le recenzează scriind despre conținut, personaje și detalii despre film, în general. Criticii de film depășesc însă acest nivel superficial, analizând scenariul, regia, performanțele actoricești, precum și detaliile tehnice care țin de modalitatea de filmare, de editare și de montare.',
        ],
        [
            'assign_letter' => 'c',
            'notion' => 'Cultură de masă',
            'description' => 'termen care definește "nu faptul că este cultura maselor sau că este produsă pentru a fi consumată de mase, ci faptul că ei îi lipsește atât  caracterul reflexiv și subtilitatea culturii "înalte" a elitelor sociale, culturale și academice, cât și simplitatea și concretețea culturii folclorice din societatea tradițională". Consecință a culturii de masă este standardizarea produsului, simplificarea conținuturilor, eliminarea dimensiunilor intelectuale în favoarea atributelor afective, accesibilității și valorizarea după criteriul economic, adică profitul. Aceasta se orientează în funcție de preferințele ",omului mediu" (Adolphe Quetelet). Din această cauză, unii teoreticieni preferă noțiunile de tehnici de difuzare colectivă, canale de difuzare colectivă pentru noțiunea cultura de masă. (Adaptat după Coman M. Introducere în sistemul mass-media. Iași, 1999)',
        ],
        [
            'assign_letter' => 'd',
            'notion' => 'Dedicație',
            'description' => 'text reverențios, măgulitor, în- scris de un autor/autoare pe exemplarul oferit unei persoane, din proprie inițiativă sau la cererea unui cumpărător/cumpărătoare. Autorii/autoarele dau dedicații cu prilejul lansării lucrării. Dedicația semnată de o personalitate sporește valoarea exemplarului. Multe dedicații sunt convenționale, mai ales atunci când autorul/autoarea este solicitat/solicitată de necunoscuți. De obicei, în asemenea cazuri, el/ea se limitează să acorde un autograf (semnătură). În istoria cărții se cunosc numeroase dedicații ample, ditirambice, pentru principi, protectori, academicieni. Genul s-a cultivat și la români, în aceeași manieră, de la începutul secolului al XIX-lea până în prezent. Este o comunicare deseori formală, fără  substanță reală în relația interpersonală. Uneori dedicația poate fi originală, inventivă, amuzantă, folosind citatul, jocul de cuvinte, aluzia.',
        ],
        [
            'assign_letter' => 'd',
            'notion' => 'Divertisment',
            'description' => 'distracție ușoară, petrecere plăcută, care nu implică niciun efort         intelectual și nicio dificultate. Masele și elitele apreciază varietatea formelor de divertisment după nevoile specifice. Mass-media și industriile culturale oferă o gamă largă a divertismentului: publicații, emisiuni, concursuri.',
        ],
        [
            'assign_letter' => 'd',
            'notion' => 'Documentare',
            'description' => 'activitate de informare, ce presupune consultarea diferitelor surse și instrumente de informare și etape de aprofundare a cunoașterii. Implică tehnici de muncă intelectuală și face parte dintr-un demers științific, de cercetare sau de elaborare a unui produs media.',
        ],
        [
            'assign_letter' => 'e',
            'notion' => 'Ecran',
            'description' => 'suport din diferite materiale (pânză, sticlă, hârtie) pentru proiecția unei imagini. Din acest cuvânt derivă termenul ecranizare – transpunerea pe ecran a unei opere literare prin realizarea unui film. Scenariul acestuia urmează, în linii  generale, mai mult sau mai puțin fidel,  structura textului.',
        ],
        [
            'assign_letter' => 'e',
            'notion' => 'Ediție',
            'description' => '(în presă) numerele identice ale unui periodic („în ediția de azi a ziarului local"). Unele ziare pot avea mai multe  ediții într-o zi, cu segmente diferite, în edițiile locale, din provincie. Există publicații internaționale care au ediții în diferite limbi, cu elemente ce se referă la țara pentru și în care se realizează ediția (de exemplu, revista National Geographic România). În anumite situații festive, de o importanță neobișnuită, apar ediții speciale, cu tiraje suplimentare ale publicației.',
        ],
        [
            'assign_letter' => 'e',
            'notion' => 'E-mail',
            'description' => 'cale de comunicare virtuală (corespondență), prin care se face schimb de informații, documente, imagini, dar nu într-un mod instant. Între emiterea și receptarea mesajului poate interveni un decalaj de timp.',
        ],
        [
            'assign_letter' => 'e',
            'notion' => 'Emisiune',
            'description' => 'comunicare de masă transmisă sub o anumită formă, după un anumit  program, cu un anumit scop (informativ, educativ, cultural, de interpretare),  pe o anumită durată, prin radio sau televiziune. Aceasta implică un producător/o producătoare, un realizator/o realizatoare și colaboratori/colaboratoare ori invitați/invitate. Poate avea una sau mai multe rubrici și poate fi permanentă sau ocazională (ex.: emisiuni de știri,       de divertisment, emisiune culturală,     muzicală).',
        ],
        [
            'assign_letter' => 'e',
            'notion' => 'Emițător/emițătoare',
            'description' => 'persoană, grup sau organizație, indiferent de dimensiunea, domeniul de activitate, poziționarea geografică sau politicile promovate, al cărei rol este de a comunica un mesaj receptorului/receptoarei prin intermediul canalelor de comunicare (poșta electronică, televiziunea, radioul, telefonul mobil etc. Emițătorul/emițătoarea reprezintă, de obicei, un grup de persoane profesioniste (ziariști/ziariste, jurnaliști/jurnaliste TV sau radio) și este producătorul/ producătoarea de mesaje, dar poate fi și un neprofesionist/o neprofesionistă care transmite mesaje virtuale.',
        ],
        [
            'assign_letter' => 'e',
            'notion' => 'E-reader',
            'description' => 'dispozitiv special creat pentru  citirea cărților electronice, care cuprinde           simultan o mare cantitate de informație. Se pot folosi la afișarea nu numai a cărților electronice, dar și pentru ziare,    reviste, chiar pagini web.',
        ],
        [
            'assign_letter' => 'f',
            'notion' => 'Film artistic',
            'description' => 'producție cinematografică care prezintă, de regulă, o istorie inventată, cu eroi/eroine imaginari/imaginare, fiind o sursă de divertisment pentru spectator/spectatoare.',
        ],
        [
            'assign_letter' => 'f',
            'notion' => 'Film documentar',
            'description' => 'producție cinematografică, bazată pe documente și cercetări, care prezintă fapte reale și lucruri interesante din viață, cu scopul de a-l informa pe spectator/spectatoare.',
        ],
        [
            'assign_letter' => 'f',
            'notion' => 'Film tridimensional (3D)',
            'description' => 'tehnică de animație, realizată cu ajutorul computerului, prin crearea efectului de mișcare a elementelor grafice, imagini sintetice care prind viață. Una dintre cele mai populare utilizări ale animației 3D include filmele de acțiune care necesită o pereche specială de ochelari (VR).',
        ],
        [
            'assign_letter' => 'f',
            'notion' => 'Forum de discuție',
            'description' => 'grupuri de discuție onine, alcătuite din utilizatori/utilizatoare care împărtășesc teme de interes comun.',
        ],
        [
            'assign_letter' => 'f',
            'notion' => 'Fotografie',
            'description' => 'imagine capturată cu ajutorul unui aparat de fotografiat și făcută vizibilă și permanentă prin tratare chimică sau stocată digital. Cuvântul vine din franțuzescul "photographie",   preluat de la greci prin "photos" – lumină și "graphos" – descriere sau scriere.',
        ],
        [
            'assign_letter' => 'f',
            'notion' => 'Fotogramă',
            'description' => 'parte a peliculei de film animat care constituie o imagine completă         a desenului.',
        ],
        [
            'assign_letter' => 'f',
            'notion' => 'Funcție',
            'description' => 'contribuție pe care un element o aduce la satisfacerea unei cerințe a sistemului din care face parte, determinând menținerea și dezvoltarea acestuia.',
        ],
        [
            'assign_letter' => 'g',
            'notion' => 'Gazetă',
            'description' => 'periodic – revistă sau ziar (din franțuzescul "gazette"). Termenul era  folosit frecvent la începutul presei românești, mai rar astăzi. După instalarea regimului comunist, în toate întreprinderile au fost introduse gazetele de perete, panourile de afișaj cu câteva spații în care erau expuse articole manuscrise ori dactilografiate și caricaturi sau fotografii, ce ilustrau viața profesională, socială și culturală internă. Articolele erau informative, laudative sau critice și, în mentalitatea epocii, puteau recompensa pe cineva sau îi puteau prejudicia imaginea.',
        ],
        [
            'assign_letter' => 'g',
            'notion' => 'Generic',
            'description' => 'parte de la sfârșitul unui film în care sunt indicate numele tuturor actorilor/actrițelor care fac parte din distribuție, realizatorii/realizatoarele lui, informații referitoare la coloana sonoră, locațiile și serviciile care au stat la baza filmării producției respective.',
        ],
        [
            'assign_letter' => 'i',
            'notion' => 'Informație',
            'description' => 'fiecare dintre elementele noi, în raport cu cunoștințele prealabile, cuprinse în semnificația unui simbol sau a unui grup de simboluri (text scris, mesaj  vorbit, grup de imagini, indicație a unui      instrument etc.). (Dicționar enciclopedic)',
        ],
        [
            'assign_letter' => 'i',
            'notion' => 'Informații personale',
            'description' => 'totalitate a datelor ce includ numele, prenumele, data și anul nașterii, vârsta, adresa unde locuiește, numărul de telefon, numele  membrilor/membrelor familiei, pozele  unei persoane etc.',
        ],
        [
            'assign_letter' => 'i',
            'notion' => 'Influencer/influenceră',
            'description' => 'lideri/lidere sau formatori/formatoare de opinie, reprezentați de celebrități, profesioniști/ profesioniste în diverse domenii ori creatori/creatoare de conținut (bloggeri/bloggeriţe, vloggeri/vloggeriţe sau instagrammeri/instagrammere), care, prin activitatea și prin atitudinea lor, pot influența gândirea, comportamentul, deciziile audienței.',
        ],
        [
            'assign_letter' => 'i',
            'notion' => 'Internet',
            'description' => 'rețea informatică de proporții, creată prin intermediul calculatorului. Cuvântul "internet" provine din îmbinarea artificială și parțială a două cuvinte englezești: inter- connected = interconectat și network = rețea. Internetul  este considerat a fi principalul vector al "noilor media", "social media" și principalul mijloc de creare a spațiului virtual, fiind unul dintre elementele centrale de analiză ale noilor media în relație cu virtualitatea. Așadar, internetul este o rețea unitară de computere și alte dispozitive cu adrese computerizate, toate conectate între ele și operând coordonat, grație unui ansamblu standardizat de protocoale de transfer de date. Se confundă adesea noțiunea de internet cu cea de WWW (World Wide Web). Ele nu sunt însă același lucru, căci WWW este numai una dintre aplicațiile internetului (e-mailul, de pildă, este alta). WWW este un sistem de documente hipertext interconectate, ce pot fi accesate prin internet. Web (< engl. web/ueb/ cu sensul de pânză) – sistem hipermedia care permite accesul la internet.',
        ],
        [
            'assign_letter' => 'i',
            'notion' => 'Interviu',
            'description' => 'produs al genului publicistic, implicând două persoane, constând dintr-o succesiune de întrebări și răspunsuri referitoare la o anumită tematică. Autorul/ autoarea principal/principală al/a unui interviu este ziaristul/ziarista, care urmărește coerența dialogului, lăsându-și interlocutorul/interlocutoarea să-și exprime opiniile (amintirile, declarațiile) și dirijând ori nuanțând comunicarea.',
        ],
        [
            'assign_letter' => 'j',
            'notion' => 'Joystick',
            'description' => 'dispozitiv care permite manevrarea de la distanță a camerei de luat vederi. Operarea de la distanță a acesteia presupune controlul manual și programarea computerizată în prealabil.',
        ],
        [
            'assign_letter' => 'l',
            'notion' => 'Lectură',
            'description' => 'act comunicațional de receptare a unui mesaj scris. Pasiv sau activ, în măsura în care cititorul/cititoarea  interpretează comunicarea, acest act poate fi nonverbal (lectură individuală, mentală) sau verbal (lectura pentru o persoană care, dintr-un motiv oarecare, nu poate citi; lectura colectivă). Lectura colectivă a fost o practică specifică societăților cu puțini membri/membre alfabetizați/alfabetizate și s-a dezvoltat în cadrul vieții comunitare, mai ales în secolul al XIX-lea.',
        ],
        [
            'assign_letter' => 'l',
            'notion' => 'Login',
            'description' => 'nume de cont cu care o persoană se identifică în spațiul online.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Magazin',
            'description' => 'gen de revistă, eclectică sau specializată, bogat ilustrată, de mare tiraj, pentru consum popular. S-a dezvoltat de la începutul secolului al XVIII-lea, îndeosebi în Anglia și SUA, dar și în alte țări din Europa. După tematică și publicul-țintă, există diferite genuri: magazin pentru toată familia, pentru femei, pentru bărbați, tineret, reviste de informatică, sportive ș.a.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Manipulare',
            'description' => 'acțiune prin care un actor social (persoană, grup, colectivitate) este determinat să gândească și să acționeze într-un mod compatibil cu interesele inițiatorului, dar nu cu interesele sale, prin utilizarea unor tehnici de persuasiune care distorsionează intenționat adevărul, lăsând însă impresia libertății de gândire și decizie. Influențarea opiniei publice printr-un ansamblu de mijloace (presă, radio, televiziune) prin care, fără a se apela la constrângeri, se impun acesteia anumite comportamente, cultivându-i-se impresia că acționează în concordanță cu propriile interese. (Dicționar enciclopedic)',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Masă',
            'description' => '„Un conglomerat uriaș de oameni, care nu se cunosc între ei, nu se află în relații de proximitate spațială, nu comunică, nu au valori și scopuri comune și pe care nu-i leagă decât un singur lucru consumul aceluiași produs cultural, distribuit pe scară largă prin tehnologiile moderne." (Coman M. Introducere in sistemul mass-media. Iași, 1999)',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Mass-media (sau mediile)',
            'description' => 'termen care desemnează ansamblul mijloacelor și modalităților tehnice moderne de informare și influențare a opiniei publice, cuprinzând radioul, televiziunea, presa, edituri, internetul (new media) etc. Sinonim relativ cu expresia comunicare de masă, înțeleasă ca mesaje și procese de comunicare, și mijloace de comunicare (instrumentele comunicării, mijloacele tehnice de transmitere a mesajelor). Termenul mass-media s-a format prin sinteza dintre cuvântul anglo-saxon „mass", cu sensul de masă, căruia i s-a adăugat latinescul „media", cu forma sa de plural, însemnând mijloace, supor tul mijloacelor transmise. Prin urmare, mijloacele media sunt, în general, definite ca „suporturi tehnice care servesc la transmiterea mesajelor către un ansamblu de indivizi". Cu ajutorul acestor mijloace, se stabilește o relație de comunicare între creatorul/ creatoarea de mesaj și receptor/receptoare. Numele de comunicare mediată se datorează faptului că acel instrument de mediere permite unuia/uneia sau mai multor emițători/emițătoare să difuzeze informații către unul/una sau mai mulți/ multe receptori//receptoare. Altfel spus, medierea se referă la „acele suporturi   care se interpun în actul comunicării,  între emițător și receptor".',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Manșetă',
            'description' => '(în presă) text de mici dimensiuni ce rezumă o știre din cuprinsul periodic. Este imprimat, de obicei, pe prima  pagină a unui ziar, cu caracter de literă  distinct față de acel al articolului la care se referă. Are un rol de atenționare.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Media',
            'description' => 'suport, mijloc. Mass-media desemnează mijloacele de comunicare în masă (presă, radio, televiziune). Deși este o formă de plural, în limba română este simțită ca formă de singular, deși există tendința de a se folosi un plural: mediile (ca pluralul de la mediu, care înseamnă spațiu natural, cultural, social, înconjurător).',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Megafon',
            'description' => 'ansamblu format dintr-un amplificator și un difuzor, de forma unei pâlnii, folosit pentru transmiterea la distanță a comenzilor; portavoce prin care regizorul/regizoarea transmite indicațiile    actorilor/actrițelor și tuturor echipei de pe platourile de filmare.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Mesaj al produsului media',
            'description' => 'conținut de idei, atitudini, emoții și trăiri pe care le       interiorizează într-o manieră profund personală un receptor/receptoare (cititor/cititoare, radioascultător/radioascultătoare, telespectator/telespectatoare etc.) în raport cu tema valorificată prin subiectul oricărui produs media: film, emisiune, piesă muzicală, reclamă, articol etc.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Microfon',
            'description' => 'aparat care transformă vibrațiile sonore în oscilații electrice, folosit în cinematografie, radio televiziune și în telecomunicații.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Moderator/moderatoare',
            'description' => 'persoană care conduce o comunicare de grup într-o anumită situație comunicațională (dezbatere, masă rotundă, emisiune cu mai mulți participanți). Moderatorul/ moderatoarea dirijează discuțiile, dezamorsează eventualele conflicte când acestea depășesc limita admisă în situația respectivă, eventual formulează concluziile. El/ea acționează ca mediator/ mediatoare între participanții direcți și între aceștia și public.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Monitor',
            'description' => 'ecran pe care se afișează textele, imaginile, filmele; aparat de control al unei instalații de telecomunicații, care urmărește imaginea proiectată de aparatele de luat vederi.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Motor de căutare',
            'description' => 'program apelabil căutător, care accesează internetul în mod          automat și frecvent și care stochează titlul, cuvintele-cheie și, parțial, chiar conținutul paginilor web într-o bază de date. În momentul în care un utilizator/o utilizatoare apelează la un motor de căutare, pentru a găsi o informație, o anumită frază sau un cuvânt, motorul de căutare se va „uita" în această bază de date și, în funcție de anumite criterii de prioritate, va crea și va afișa o listă de rezultate (engleză: hit list). Cele mai utilizate motoare de căutare sunt Google, Yahoo, Baidu, Bing, Ask și Aol, Яндекс ș.a. În topul preferințelor utilizatorilor/utilizatoarelor este în prezent Google, care ne poate ajuta să găsim nu numai site-uri, ci și imagini, locații, cărți și multe alte elemente grație numeroaselor filtre introduse. Există chiar și Google Scholar, o variantă a motorului de căutare ce se concentrează asupra materialelor științifice care au fost revizuite de către cercetători/cercetătoare sau profesori/profesoare. Google Scholar este perfect pentru cei care vor să alcătuiască o lucrare științifică și pentru cei care caută materiale pentru o dezbatere.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Mouse',
            'description' => 'dispozitiv acțional manual, care transmite comenzile utilizatorului/utilizatoarei către computer, prin deplasarea cursorului grafic pe ecran. Numele de  mousse (rom.: șoarece), de origine engleză, a fost dat acestui dispozitiv pentru asemănarea sa exterioară cu un șoarece.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Multimedia',
            'description' => 'aplicație care, utilizând calculatorul, combină textul, sunetul, imaginile statice și video, procedeele de animație într-o comunicare complexă, vizând transmiterea de informații sau divertismentul. Cele mai moderne sunt interactive. Astfel, o enciclopedie multimedia ilustrează un fenomen, facilitând selecția informațiilor, detalierea unora dintre ele, vizualizarea tridimensională, permițând utilizatorului/utilizatoarei să circule, zăbovind sau alegându-și obiectivele, într-o lume virtuală.',
        ],
        [
            'assign_letter' => 'm',
            'notion' => 'Mulțime',
            'description' => 'conglomerat uriaș de oameni care nu se cunosc și nu comunică între  ei; nu trăiesc în aceeași zonă; nu împărtășesc valori, credințe, convingeri, scopuri comune; sunt eterogeni din punct de vedere economic, social, cultural, religios etc.; sunt legați exclusiv de consumul aceluiași produs mass-media (transmis prin mijloace diverse). În opinia lui Denis McQuail, masele reprezintă „un agregat de spectatori, cititori, ascultători și privitori", caracterizați în esență prin dispersie și anonimat. (Adaptat după Toma Mircea (coord.), Competență în mass media. București, 2004)',
        ],
        [
            'assign_letter' => 'n',
            'notion' => 'Navigator sau browser',
            'description' => 'aplicație software (program) ce permite utilizatorilor/ utilizatoarelor să afișeze un text, grafică, video, muzică și alte informații situate pe o pagină din World Wide Web, precum și să comunice cu furnizorul de informații și chiar ei între ei. "Prin browser se înțelege un program de «navigare» (virtuală) în web". De aceea, în loc de cuvântul browser se poate folosi și termenul general navigator. Cele mai rapide navigatoare sunt Mozilla Firefox, Chrome, Opera, Safari, Maxthon 4.4, Internet Explorer.',
        ],
        [
            'assign_letter' => 'n',
            'notion' => 'Netichetă',
            'description' => 'termen special, construit prin compunerea de la "net" și "etichetă", care definește codul de comunicare într-o rețea online.',
        ],
        [
            'assign_letter' => 'n',
            'notion' => 'Noile media',
            'description' => 'rezultatul convergenței dintre sistemul mediatic tradițional (televiziune, radio, presă scrisă), telecomunicații, tehnologia digitală și sisteme informatice computerizate. Acestea includ computerele personale, teletextul, sistemul de înregistrare video, videotextul, televiziunea prin cablu, sateliții de telecomunicații, sistemele de teleconferințe și videoconferințe, mesageria vocală, sistemul de transmitere prin fax, televiziunea de înaltă fidelitate, telefonia mobilă, televiziunea interactivă, CD-ROM, DVD, instant messagingul, inteligența artificială, grafica tridimensională și realitatea virtuală. (Adaptat după Dobrescu P. Prolegomene la o posibilă istorie a comunicării. București, 2003)',
        ],
        [
            'assign_letter' => 'o',
            'notion' => 'Opinie publică',
            'description' => 'ansamblu de cunoștințe, convingeri și trăiri afective, manifestate cu o intensitate relativ mare de membrii unui grup sau ai unei comunități față de un anumit domeniu de importanță socială majoră. (Dicționar de sociologie)',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Podcast',
            'description' => 'emisiune radio cu mai multe episoade corelate tematic, care folosește o metodă de distribuție și amenajare pe  internet a fișierelor în format audio, iar mai nou și video. Utilizatorii/utilizatoarele unui site pot descărca fișierele în timp real și le pot asculta, atunci când doresc, cu ajutorul unor echipamente mobile sau calculatoare ce acceptă formatul în care acestea au fost create. Un autor/autoare de podcasturi este, de obicei, denumit podcaster/podcasteră.',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Poștă electronică',
            'description' => 'sistem de comunicare prin care se pot transmite mesaje electronice de la o persoană la alta.',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Presă',
            'description' => 'totalitate a modalităților de comunicare care pot ajunge la un număr  foarte mare de oameni. Presa este o formă de exprimare a libertății de gândire, care contribuie la schimbul de idei, pluralismul de idei și la formarea opiniei publice.',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Prezentator/prezentatoare',
            'description' => 'persoană care, în mass-media sau într-o situație comunicațională publică (festival, premieră), citește un text explicativ. Prezentatorul/ prezentatoarea expune textele altei persoane (redactor/redactoare), eventual cu intervenții proprii, ca legătură între mesajele prezentate. Este protagonistul/ protagonista emisiunilor de actualități sau conduce concursurile televizate.',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Program',
            'description' => 'plan al unei acțiuni (inclusiv comunicative) care sistematizează desfășurarea acesteia după anumite criterii și intenții (ex.: programul unui spectacol, al unei emisiuni radio/TV, al unei vizite, al unei reuniuni).',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Prompter',
            'description' => 'dispozitiv sau atașament al camerei de filmat pe care rulează replicile ce trebuie rostite de cel care ține un discurs în cadrul unui spectacol sau al unei reprezentații televizate. Ultimele forme de promptere reprezintă ecrane de televizor amplasate dedesubtul camerei de luat vederi, care proiectează replici, indicații scenice etc.',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Public',
            'description' => 'comunitate umană constituită, ca  atare, într-o situație comunicațională,  în legătură cu receptarea unor mesaje, având un centru de interes comun. După gradul de implicare, publicul poate fi asistent sau participativ. După direcțiile de interes, există public general, public specializat și public de grup foarte restrâns. Din punct de vedere geografic, există public global (la nivel planetar, în raport cu mass-media), public național, public local. Publicul general este format din diferite categorii psihosociale, de sex, de vârstă, cu nivel cultural variat și caracteristici determinate de toți acești factori.',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Public-țintă',
            'description' => 'categorie specifică de receptori/receptoare care preferă un anumit tip de produs media.',
        ],
        [
            'assign_letter' => 'p',
            'notion' => 'Publicitate',
            'description' => 'formă de comunicare de tip persuasiv, având rolul de a modifica atitudinea receptorilor/receptoare- lor în sensul achiziției unui produs sau serviciu anume, ale cărui calități anunțate sunt reale. (O. Guinn, T.Allen)',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Radio',
            'description' => 'mijloc de comunicare în masă. Cuvântul desemnează atât aparatul receptor, cât și tehnologia însăși, bazată  pe transmiterea de unde radio (radiodifuziune) în sistem public sau privat (radioamatorism, practicat prin posturi de emisie-recepție particulare, fără scop economic sau cultural). Publicul amator de radio se constituie între 1912 și Primul Război Mondial. Din 1920, în SUA, unele stații radio difuzează programe pentru un public general. Ca mijloc de comunicare în masă, radioul cunoaște o dezvoltare puternică începând cu anul 1921.',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Radiodifuziune',
            'description' => 'emisie de programe sonore prin utilizarea undelor radioelectrice. În România prima transmisiune pentru public a avut loc în anul 1920. Radiodifuziunea s-a dezvoltat la începutul secolului al XX-lea printr-o suită de descoperiri și invenții.',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Receptor/receptoare (destinatar/destina- tară)',
            'description' => 'orice grup uman caracterizat atât prin atitudini și opinii comune, cât și prin continuitatea ideilor și valorilor sociale, constituind ținta mesajului transmis de emițător/emițătoare. În limba română avem mai mulți termeni care îi desemnează pe cei/cele care receptează mesajele prin media (consumatorii/consumatoarele de mesaje): public, audiență, cititor/cititoare, radioascultător/radioascultătoare, telespectator/telespectatoare.',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Redactor/redactoare',
            'description' => 'funcție în cadrul mass-mediei scrise și audiovizuale. Autor/autoare de comunicări scrise și orale (știri, comentarii, interviuri), care prelucrează, când este cazul, materialele aduse de reporter/reporteră sau preluate de la agențiile de știri. Funcția există și în activitatea editorială (redactor/redactoare de carte).',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Redacție',
            'description' => 'grup de persoane având funcții redacționale. Într-o editură sau la un ziar există redacții specializate (politică, sport, cultură), un serviciu de tehnoredactare, un serviciu de corectură, unul de difuzare ș.a. Se numește redacție și spațiul de lucru al redactorilor/redactoarelor (ex.: „telefonez de la redacție").',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Regim al zilei',
            'description' => 'mod de organizare, prin alternare și dozare ca timp, a activităților desfășurate de o persoană pe durata unei zile.',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Replică',
            'description' => 'orice propoziție, frază, cuvânt sau grup de cuvinte incluse într-un scenariu și pe care un actor/actriță le rostește într-un film, la televizor, la radio sau pe scenă.',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Reporter/reporteră',
            'description' => 'funcție în presa scrisă și audiovizuală. Reporterul/reportera culege informațiile și consemnează evenimentele la fața locului, relatându-le în mod obiectiv (relativ) sau subiectiv.',
        ],
        [
            'assign_letter' => 'r',
            'notion' => 'Revistă',
            'description' => 'publicație periodică sub formă de carte sau de ziar, cu apariție săptămânală, lunară, trimestrială sau anuală, de obicei regulată. De tip magazin, eclectică sau specializată într-un domeniu, revista cuprinde toate genurile presei. De mare sau de mic tiraj, populare sau savante, cu diverse rubrici și ilustrații, revistele acoperă toate domeniile de activitate și se bucură de succes încă din secolul al XVIII-lea. Colecțiile de reviste se conservă în biblioteci, unde pot fi consultate pentru dimensiunea lor documentară și după ce unele își încetează apariția. Acestea reprezintă excelente documente pentru reconstituirea vieții sociale a fiecărei epoci.',
        ],
        [
            'assign_letter' => 's',
            'notion' => 'Scene obligatorii',
            'description' => 'scene tipice pe care spectatorii/spectatoarele așteaptă să le vadă  într-un anumit gen de film.',
        ],
        [
            'assign_letter' => 's',
            'notion' => 'Site',
            'description' => 'loc în care se pot accesa informații utile (texte, imagini, sunete, programe),  într-o rețea, de obicei internet.',
        ],
        [
            'assign_letter' => 's',
            'notion' => 'Spot',
            'description' => 'scurt anunț sau reclamă comercială prezentată la radio și televiziune. Expresia "spot publicitar" este, așadar, un pleonasm.',
        ],
        [
            'assign_letter' => 's',
            'notion' => 'Știre',
            'description' => 'informație importantă la momentul respectiv despre evenimente recente, curente sau viitoare, comunicate prin media scrisă și audiovizuală. Ea trebuie să se refere la fapte din viață și la dezvoltarea comunității. Ca gen jurnalistic informa- tiv, știrea trebuie să fie scrisă într-un limbaj neutru, fără adjective și aprecieri, fără  figuri de stil și să redea doar faptele, fără ca acestea să fie comentate de jurnalist.',
        ],
        [
            'assign_letter' => 's',
            'notion' => 'A stoca',
            'description' => 'acțiune de înmagazinare în memoria unui computer, laptop, disc sau a unui USB (card flash) a informației.',
        ],
        [
            'assign_letter' => 't',
            'notion' => 'Talk-show',
            'description' => 'gen de emisiune la radio sau televiziune, în care două sau mai multe persoane discută o problemă de interes public (în engleză, to talk – a vorbi, show – spectacol). Adoptat în limba română, termenul desemnează un tip de program/emisiune cu caracter informativ, analitic, de dezbatere sau divertisment. Participă un moderator/o moderatoare și unul sau mai mulți invitați/mai multe invitate, permanenți/permanente sau ocazionali/ocazionale, având un subiect mai  bine sau mai puțin delimitat/precizat. Pot interveni sau nu telefonic și alte persoane presupus competente sau informate în problematica discutată. Publicul se poate pronunța prin SMS, iar o selecție din intervențiile sale se face publică prin crawl. Uneori, publicul votează/răspunde la întrebări de tip anchetă, iar în cursul emisiunii răspunsurile (DA/NU), contabilizate, sunt prezentate grafic și statistic.',
        ],
        [
            'assign_letter' => 't',
            'notion' => 'Tastatură sau claviatură',
            'description' => 'dispozitiv cu taste, care îndeplinesc anumite funcții, servind la transmiterea comenzilor utilizatorului/utilizatoarei către computer.',
        ],
        [
            'assign_letter' => 't',
            'notion' => 'Tehnologii informaționale',
            'description' => 'ansamblu de mijloace, procese, metode, operații etc., utilizate cu scop de informare.',
        ],
        [
            'assign_letter' => 't',
            'notion' => 'Televizor (TV)',
            'description' => 'dispozitiv electronic, folosit pentru a recepționa și a reda emisiuni de radiodifuziune vizuală (televiziune radiodifuzată), care difuzează programe de televiziune, fi ind folosit astăzi pentru divertisment,  pentru educare și pentru informare.       Progresul tehnologic a transformat televizorul într-un dispozitiv complex, care poate accesa internetul și poate    reda imagini tridimensionale. Primul  televizor color a fost produs de către  Toshiba în 1959, iar din 1960 era disponibil pentru cumpărare.',
        ],
        [
            'assign_letter' => 't',
            'notion' => 'Televiziune',
            'description' => 'tehnică de transmitere la distanță a imaginilor în mișcare și a  sunetului. Acest mijloc de comunicare în masă a apărut ca un "apendice" al radioului și a dobândit autonomie mai ales după cel de-Al Doilea Război Mondial.',
        ],
        [
            'assign_letter' => 'u',
            'notion' => 'Utilizator/utilizatoare online',
            'description' => 'persoană care utilizează diferite aplicații, recepționând și "consumând" informații din media de socializare.',
        ],
        [
            'assign_letter' => 'v',
            'notion' => 'Video+audio sau videoconferință',
            'description' => 'procedeu modern de telecomunicație, prin care mai multe persoane aflate în locuri diferite pot participa la o conferință/discuție prin intermediul unui sistem format din computere, camere video și rețea telefonică.',
        ],
        [
            'assign_letter' => 'v',
            'notion' => 'Vlog (prescurtare de la "video blog")',
            'description' => 'blog transpus sub forma unui video,  jurnal video, publicat pe o platformă  online. Acesta permite creatorilor/creatoarelor să împărtășească informații, experiențe și idei, pe care le distribuie pe YouTube, dar și Vimeo, TikTok, Twitch etc., facilitând astfel exprimarea vizuală și interacțiunea cu audiența. Prin promovarea unor produse, servicii și afișarea unor reclame,  vloggerii și vloggerițele au și câștiguri.',
        ],
        [
            'assign_letter' => 'z',
            'notion' => 'Ziar',
            'description' => '(din italienescul "diario") publicație cu periodicitate zilnică, jurnal, gazetă. Mijloc de informare în masă,  apărut ca tipăritură "ocazională" în 1529, dezvoltat cu periodicitate regulată în secolele următoare. Prin extensie, cuvântul ziar se folosește pentru a desemna (impropriu) și periodice  săptămânale. În mod normal, el se referă la cotidian.',
        ],
    ];

    // Prepare rows in ACF field key format
    $acf_rows = [];

    foreach ($vocabulary_data as $item) {
        $acf_rows[] = [
            'field_66c22a5770879' => $item['assign_letter'],  // assign_letter
            'field_66c22a02f7931' => $item['notion'],         // notion
            'field_66c22a20f7932' => $item['description'],    // description
        ];
    }

    // Insert into the 'notions' repeater
    update_field('field_66c229bdf7930', $acf_rows, $post_id);
}

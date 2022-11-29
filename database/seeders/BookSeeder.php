<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create
        (
            [
                "title" => "Pustolovina meduze",
                "description" => "Knjiga koja vas uvodi u pustolovine jedne meduze,
                čiji je san da istraži atlanski okean kako bi otkrila njene tajne",
                "author" => "Milovan",
                "publisher" => "FantazijaMora",
                "image_link" => "https://cdn.pixabay.com/photo/2020/07/25/16/31/jellyfish-5437207_960_720.png",
                "book_link" => "https://docdro.id/HEwxtwg",
                "price" => "980",
                "category_id" => Category::where("name", "=", "Bajka")->first()->id
            ]
        );

        Book::create
        (
            [
                "title" => "Tesla: energija struje",
                "description" => "Nikola Tesla (Smiljan, 10. jul 1856 — Njujork, 7. januar 1943) bio je srpski i američki pronalazač,
                inženjer elektrotehnike i mašinstva i futurista,
                najpoznatiji po svom doprinosu u projektovanju modernog sistema napajanja naizmeničnom strujom.
                U ovoj knjizi videćete detaljnije kako sve ovo funkcioniše na naučnoj osnovi",
                "author" => "Vladislav",
                "publisher" => "NaukaSveta",
                "image_link" => "https://cdn.pixabay.com/photo/2019/01/02/22/29/nikola-tesla-3909844_960_720.jpg",
                "book_link" => "https://docdro.id/5CBU2kj",
                "price" => "1200",
                "category_id" => Category::where("name", "=", "Nauka")->first()->id
            ]
        );

        Book::create
        (
            [
                "title" => "Tamne čestice svemira",
                "description" => "Svemir, kosmos, vasiona ili univerzum je beskonačno prostranstvo koje nas okružuje.
                Svemirom zovemo prostor-vreme,
                koji čine svetle galaksije (koje sadrže mnogo zvezda i drugih nebeskih tela) rasute u tamnom međugalaktičkom (i međuzvezdanom),
                uslovno, „praznom” prostor-vremenu koje zovemo vakuum.
                To je sveukupni prostor-vreme u kome plovi mnoštvo materijalnih nebeskih tela kao što su:
                zvezde, planete, satelite, planetoide, komete, meteore, crne rupe i neutronske zvezde.
                Ipak, najveći deo materije i energije je najverovatnije u obliku takozvane tamne materije i tamne energije.",
                "author" => "Milutin",
                "publisher" => "NaukaSveta",
                "image_link" => "https://images.unsplash.com/photo-1462331940025-49waG9?????..,.,.,.",
                "book_link" => "https://docdro.id/jjbnCA8",
                "price" => "1500",
                "category_id" => Category::where("name", "=", "Nauka")->first()->id
            ]
        );

    }
}

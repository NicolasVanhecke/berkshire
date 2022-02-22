<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'The Duke of Berkshire vijf keer anders',
            'De ultieme Bbq voor de warme zomer',
            '5 tips voor de perfecte cuisson',
            'Slagerij in de kijker: slagerij de knock',
            '5 tips voor de perfecte cuisson',
            'The Duke of Berkshire vijf keer anders',
            'De ultieme Bbq voor de warme zomer',
            'Slagerij in de kijker: slagerij de knock',
            '5 tips voor de perfecte cuisson',
            'De ultieme Bbq voor de warme zomer',
            'Slagerij in de kijker: slagerij de knock',
            'The Duke of Berkshire vijf keer anders',
        ];

        $body = '<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
        <p>Orci, sagittis in ut et facilisi metus fusce ac ac. Et cras ipsum neque fusce volutpat nulla. Pretium ipsum venenatis orci, lobortis quam et adipiscing cras. Pharetra massa mauris, sit nisi mi quam arcu nunc. Aliquet lectus tempus fringilla risus nulla rhoncus enim. Turpis sed lacus a purus diam.</p>
        <p><b>Eget viverra viverra amet, sed sed et dictum</b> ac scelerisque. At morbi pulvinar ut at venenatis, diam at. Hendrerit ultrices pretium nibh odio. Sagittis, sit accumsan, ac pharetra fermentum maecenas fames iaculis. Odio morbi in aliquet mi aliquam placerat ut. Neque fringilla ac egestas quam lectus sagittis.</p>
        <p>Massa, amet dignissim maecenas eu arcu nec non nisi sollicitudin. Blandit turpis nulla viverra ullamcorper pellentesque donec blandit viverra sed. Eu est lorem morbi mattis in sit orci. Sit gravida cursus neque massa odio non quam nullam. Commodo elementum pretium feugiat integer aliquam morbi. Nec at molestie ultrices feugiat. Netus tincidunt vitae sit euismod scelerisque. <b>Porttitor commodo</b>, maecenas sapien nisl pellentesque. Cras congue semper magna posuere habitant tincidunt id. Pretium quis ac, donec nibh mauris. Varius in scelerisque congue tincidunt est nullam eu quis. Nulla aenean donec sed suspendisse pellentesque morbi elit malesuada id. Adipiscing diam massa nunc augue magna integer pellentesque ultrices commodo. Eget laoreet dolor senectus nulla elementum tempus ante.</p>
        <h3>Ipsum id nulla convallis duis pretium justo proin.</h3>
        <p>Integer facilisi amet, egestas facilisis ut. Scelerisque eget vestibulum eget in at curabitur a, dolor. Nec consectetur amet eget ipsum. Egestas ut facilisis id mi odio amet pellentesque. Nunc in mattis venenatis quam semper viverra. Proin placerat varius sit bibendum quis dui, scelerisque <a href="http://google.com">faucibus ultrices</a>.</p>
        <p>Sit elementum tortor in tristique enim amet pellentesque turpis. Et tincidunt nec pharetra nulla. Vulputate sit id viverra malesuada velit, purus. In consequat sapien consectetur pellentesque condimentum amet vel mi. Id sed eu quis varius velit tortor etiam. <b>Egestas neque, duis eu amet</b>, enim purus leo commodo. Faucibus eu posuere placerat pulvinar. Mi integer mauris a risus purus ultrices pretium senectus vestibulum. Turpis consequat donec massa dignissim duis turpis massa auctor. Arcu vitae sit lectus sed vulputate facilisis pulvinar tincidunt amet. Leo velit id eget at id aliquam nulla quisque neque. Diam mollis hendrerit vitae quis donec massa venenatis. At nunc, lectus ultricies adipiscing sit posuere. <b>Egestas</b> velit orci lobortis dictumst mattis mauris ut nunc quam. Quis urna enim urna, dictum turpis elit.</p>
        <blockquote><h5>Quote uit het artikel Etiam euismod nisl ut pulvinar ornare. Donec maximus erat a ligula egestas, tincidunt ullamcorper nibh hendrerit. Morbi condimentum ligula vehicula finibus luctus. Sed laoreet ligula quis felis fermentum, in aliquam purus fringilla.</h5></blockquote>
        <h3>Vitae in scelerisque pulvinar quis sit. Placerat pulvinar nulla et sed gravida nascetur tempor, feugiat vitae.</h3>
        <p>Egestas pellentesque ultrices maecenas eros lorem at sed. Pulvinar laoreet magna ipsum, massa. <b>Nec in venenatis</b>, nibh auctor mauris, auctor velit. Gravida donec magna nisl leo pulvinar ut egestas. Eu dui, aliquam facilisis non porta risus ipsum non quam. A duis sed nec imperdiet. Convallis viverra sit suspendisse tristique eget scelerisque a tristique. Commodo vitae massa risus ultricies commodo magnis id augue erat. Sit adipiscing sagittis odio purus quisque. Nulla mi egestas urna sit ac dui facilisis at. Habitant consectetur at duis pretium id <b>suspendisse nulla</b> arcu. Gravida adipiscing vitae urna eu, sem massa.</p>';

        foreach( $titles as $title ){
            $image = Str::slug( $title, '-' ) . '.png';

            DB::table('articles')->insert([
                'title' => $title,
                'image' => $image,
                'short' => 'Orci, sagittis in ut et facilisi metus fusce ac ac. Et cras ipsum neque fusce volutpat nulla. Pretium ipsum venenatis orci, lobortis quam et adipiscing cras. Pharetra massa mauris, sit nisi mi quam arcu nunc.',
                'body' => $body,
                'created_at' => now(),
            ]);
        }
    }
}

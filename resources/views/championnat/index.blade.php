@extends('layout-main.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <section>
                        <h1 class="text-center text-2xl">Présentation</h1>
                        <article>
                            <p>Bonjour et bienvenue dans ce site.</p>
                            <p>
                                Ce site vous permet de gérer un ou plusieurs championnats selon votre choix.
                                Nous avons quatre championnats qui corresponds aux grands championnats europeens qui sont: <br>
                                La Liga(Espagne), Ligue 1(France), Bundesliga(Allemagne) et Serie A(Italie).
                                Donc Vous avez votre choix.
                            </p>
                        </article>
                    </section>

                    <section>
                        <h1 class="text-center text-2xl">Fonctionnalité</h1>
                        <p>
                            Nous allons vous montrer ce que vous pouvez faire:
                            <br>
                            Tout d'abord vous voyez un bouton en haut qui vous permet de vous diriger dans l'un des championnats.
                            <br>
                            un fois dedans vous pouvez commencer à gérer votre championnat
                        </p>
                        <p>Au commencement tout est vide mais il y'aura cinq boutons pour vous permettre de gerer.</p>
                        <br>
                        <p>
                            Pour commencer il faut d'abord ajouter les équipes de votre championnat. attention! le nombre d'équipe d'une championnat
                            doit être de chiffre pair comme 8, 10, 12... mais pas 7, 9 ...
                            <br>
                            Le nombre d'équipes d'un championnat doit être entre 8(inclus) et 20(inclus).
                        </p>
                        <br>
                        <p>
                            Après avoir ajouter vos équipes il faut valider ce championnat enfin que les équipes du championnat soient prises en compte.
                            Si vous ne le faite pas vous ne pourrez pas gérer votre championnat
                        </p>
                        <br>
                        <p>
                            Si le championnat a été validé vous pouvez passer à l'étape suivant qui est d'ouvrir une journée pour pouvoir ajouter des matchs
                        </p>
                        <br>
                        <p>
                            Ensuite vous pouvez ajouter des matchs.
                            <i>Toutes les équipes doivent jouer une fois dans la journée</i>
                        </p>
                        <br>
                        <p>
                            Pour passer à une autre journée vous devez fermer la journée actuelle et ouvrir la suivante
                        </p>
                        <br>
                        <p>
                            Quand tout les journées ont été complété alors le championnat sera clos
                        </p>
                        <br>
                        <p>
                            Vous pouvez voir le classement ainsi que les matchs par journée.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
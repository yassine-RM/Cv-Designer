<div class="nav-side-menu  sideSide">
    <div class="menu-list mt-5">
        <ul class="navbar-nav text-light" id="ul">


            <li data-toggle="collapse" data-target="#products" class="mb-3 mt-5">
                <a data-toggle="modal" id="cursor" data-target="#infoModal" @click="openInfos()"><i
                        class="fa fa-info text-warning"></i>
                    Information <i class="fa fa-caret-right" aria-hidden="true"></i></a>
            </li>
            <li data-toggle="collapse" data-target="#products">
                <a data-toggle="modal" id="cursor" data-target="#formModal" class="nav-link text-light"
                    @click.prevent='formation'>
                    <i class="text-warning fa fa-graduation-cap"></i> Formations <i class="fa fa-caret-right"></i></a>
            </li>
            <li data-toggle="collapse" data-target="#products">
                <a data-toggle="modal" id="cursor" data-target="#compModal" class="nav-link text-light"
                    @click.prevent='competence'>
                    <i class="text-warning fa fa-id-card"></i> Competences <i class="fa fa-caret-right"></i></a>
            </li>

            <li data-toggle="collapse" data-target="#products">
                <a data-toggle="modal" id="cursor" data-target="#expModal" class="nav-link text-light"
                    @click.prevent='experience'>
                    <i class="text-warning fa fa-suitcase"></i> Experiences <i class="fa fa-caret-right"></i></a>
            </li>
            <li data-toggle="collapse" data-target="#products">
                <a data-toggle="modal" id="cursor" data-target="#langModal" class="nav-link text-light"
                    @click.prevent='langue'>
                    <i class="text-warning fa fa-language"></i> Langues <i class="fa fa-caret-right"></i></a>
            </li>
            <li data-toggle="collapse" data-target="#products">
                <a data-toggle="modal" id="cursor" data-target="#loisModal" class="nav-link text-light"
                    @click.prevent='loisire'>
                    <i class="text-warning fa fa-paper-plane-o"></i> Loisires <i class="fa fa-caret-right"></i></a>
            </li>
            <li data-toggle="collapse" data-target="#products">
                <a data-toggle="modal" id="cursor" data-target="#linkModal" class="nav-link text-light"
                    @click.prevent='link'>
                    <i class="text-warning fa fa-link"></i> Liens <i class="fa fa-caret-right"></i></a>
            </li>



        </ul>
    </div>
</div>

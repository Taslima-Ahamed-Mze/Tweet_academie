<div class="container">
    <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <button class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem -1rem -1rem -1rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="modalTitle">Éditer le profil</h5>
                <input id="button_profile" type="submit" name="button_profile" value="Valider">
            </div>

                <!-- <div class="switch">Dark mode:
                    <span class="inner-switch">OFF</span>
                </div> -->

            <div class="modal-body">
                <div class="md-form mb-5 pb-5">
                    <div class="d-flex flex-wrap align-items-center justify-content-center position-relative" id="banner_image_upload">
                        <label for="banner_file_input">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input id="banner_file_input" type="file"/>
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-center position-absolute" id="profil_image_upload" style="background-image: url(<?php echo "profil/image/".$_SESSION['profile_picture']."";?>)">
                        <label for="profil_file_input">
                            <i class="fas fa-camera" style="color: #58bfe7;"></i>
                        </label>
                        <input id="profil_file_input" name="profil_file" type="file"/>
                    </div>
                </div>
                <div id="form-profil" class="m-4">
                    <div class="md-form mb-5 d-flex flex-column-reverse">
                        <small id="charNumName" class="form-text text-muted">
                            0/50
                        </small>
                        <input type="text" id="form_name" name="name" maxlength="50" placeholder="Modifier votre nom" class="form-control" aria-describedby="charNumName">
                        <label for="form_name">Nom</label>
                    </div>

                    <div class="md-form mb-5 d-flex flex-column-reverse">
                        <small id="charNumSurname" class="form-text text-muted">
                            0/50
                        </small>
                        <input type="text" id="form_surname" name="surname" maxlength="50" placeholder="Modifier votre prénom" class="form-control" aria-describedby="charNumSurname">
                        <label for="form_surname">Prénom</label>
                    </div>

                    <div class="md-form mb-5 d-flex flex-column-reverse">
                        <small id="charNumEmail" class="form-text text-muted">
                            0/50
                        </small>
                        <input type="text" id="form_email" name="surname" maxlength="50" placeholder="Modifier votre email" class="form-control" aria-describedby="charNumEmail">
                        <label for="form_email">Email</label>
                    </div>

                    <div class="md-form mb-5 d-flex flex-column-reverse">
                        <small id="charNumBio" class="form-text text-muted">
                            0/160
                        </small>
                        <textarea type="text" id="form_bio" name="bio" rows="4" maxlength="160" placeholder="Ajouter votre biographie" class="form-control" aria-describedby="charNumBio"></textarea>
                        <label for="form_bio">Bio</label>
                    </div>

                    <div class="md-form mb-5">
                        <label for="form_birthdate">Date de naissance</label>
                        <a class="ml-2" data-toggle="collapse" href="#collapseExample" role="link" aria-expanded="false" aria-controls="collapseExample">
                            Editer
                        </a>
                        <div class="collapse" id="collapseExample">
                        <div class="fieldset_birthdate">
                                <input class="mt-3" type="date" min="1920-01-01" max="2020-12-31" name="birthdate" id="form_birthdate"><br>
                        </div>
                        </div>
                    </div>

                    <div class="md-form mb-5">
                        <label for="form_birthdate">Theme</label>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

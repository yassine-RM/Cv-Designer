<!-- Modal -->
<div class="modal fade" id="theme" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " style="max-width: 50% !important;color: black" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-paint-brush text-danger"
                        aria-hidden="true"></i> Choisissez un thème</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row  mt-1 text-center" id='theme'>

                    <div class="col  ">
                        <p>Template 1</p>
                        <a href="" id="template1" @click.prevent="show='t1'"><img
                                src="{{ asset('images/template1.jpg') }}" height="70%" width="100%" alt=""
                                srcset=""></a>
                    </div>
                    <div class="col  ">
                        <p>Template 2</p>
                        <a href="" id="template2" @click.prevent="show='t2'"><img
                                src="{{ asset('images/template2.jpg') }}" height="70%" width="100%" alt=""
                                srcset=""></a>
                    </div>
                    <div class="col  ">
                        <p>Template 3</p>
                        <a href="" id="template2" @click.prevent="show='t3'"><img
                                src="{{ asset('images/template3.jpg') }}" height="70%" width="100%" alt=""
                                srcset=""></a>
                    </div>
                    <div class="col ">
                        <p>Template 4</p>
                        <a href="" id="template2" @click.prevent="show='t4'"><img
                                src="{{ asset('images/template4.jpg') }}" height="70%" width="100%" alt=""
                                srcset=""></a>
                    </div>
                    <div class="col ">
                        <p>Template 5</p>
                        <a href="" id="template2" @click.prevent="show='t5'"><img
                                src="{{ asset('images/template5.jpg') }}" height="70%" width="100%" alt=""
                                srcset=""></a>
                    </div>
                </div>

                <div class="row mt-5" id='theme'>
                    <div class="col-6 offset-3 text-center">
                        <table>
                            <tr>
                                <td>Background Color</td>
                                <td><input type="color" name="back" v-model="bg" @change='backColor()'></td>
                                <td>@{{ bg }}</td>
                            </tr>
                            <tr>
                                <td>Text Coleur</td>
                                <td><input type="color" name="text" v-model="text" @change='textColor()'></td>
                                <td>@{{ text }}</td>
                            </tr>
                        </table>

                        <br>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

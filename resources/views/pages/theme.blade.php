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

                        <a href="" @click.prevent="bgColor='background-color:black;color:white'"
                            style="background-color: black ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:violet;color:black'"
                            style="background-color: violet ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:deepskyblue;color:black'"
                            style="background-color: deepskyblue ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:green;color:black'"
                            style="background-color: green ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:blueviolet;color:black'"
                            style="background-color: blueviolet ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:chocolate;color:black'"
                            style="background-color: coral ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:darkturquoise;color:black'"
                            style="background-color: darkturquoise ;width: 5px;height: 5px"> <i
                                class="fa fa-paint-brush" aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:antiquewhite;color:black'"
                            style="background-color: antiquewhite ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:darkgray;color:black'"
                            style="background-color: darkgray ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:cyan;color:black'"
                            style="background-color: cyan ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>
                        <a href="" @click.prevent="bgColor='background-color:thistle;color:black'"
                            style="background-color: thistle ;width: 5px;height: 5px"> <i class="fa fa-paint-brush"
                                aria-hidden="true"></i></a>

                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

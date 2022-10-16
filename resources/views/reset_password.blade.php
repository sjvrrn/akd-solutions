@extends('layout.authlayout')
@section('content-wrapper')
<div class="reset-password-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="reset-password-content">
                        <div class="row m-0">
                            <div class="col-lg-5 p-0">
                                <div class="image">
                                    <img src="{{url('assets/img/computer.png')}}" alt="image">
                                </div>
                            </div>

                            <div class="col-lg-7 p-0">
                                <div class="reset-password-form">
                                    <h2>Reset Your Password</h2>

                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="remember_token" value="{{$token}}">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Enter a new password" required>
                                            <span class="label-title"><i class='bx bx-lock'></i></span>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirm your new password">
                                            <span class="label-title"><i class='bx bx-lock-alt'></i></span>
                                        </div>

                                        <button type="submit" class="reset-password-btn">Reset my Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
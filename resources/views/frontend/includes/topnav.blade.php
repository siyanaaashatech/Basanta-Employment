 <section class="topheader">
    <div class="container">

        <div class="row">
            <div class="col-md-6 text-left col-sm-12">

                <div class="social-buttons">
                    <a href="{{ $sitesetting->facebook_link }}"
                        class="social-buttons__button social-button social-button--facebook" aria-label="Facebook">
                        <span class="social-button__inner">
                            <i class="fab fa-facebook-f"></i>
                        </span>
                    </a>
                    <a href="{{ $sitesetting->linkedin_link }}"
                        class="social-buttons__button social-button social-button--linkedin" aria-label="LinkedIn">
                        <span class="social-button__inner">
                            <i class="fab fa-linkedin-in"></i>
                        </span>
                    </a>
                    <a href="{{ $sitesetting->instagram_link }}" target="_blank"
                        class="social-buttons__button social-button social-button--instagram" aria-label="InstaGram">
                        <span class="social-button__inner">
                            <i class="fab fa-instagram"></i>
                        </span>
                    </a>
  

                </div>

            </div>

            <div class="col-md-6 col-sm-12 top_right row">
                <div class="info d-flex align-items-center col-6">
                    <i class="fab fa-instagram mt-1 mx-1"></i> 
                    <span>
                        @if (!empty($sitesetting->office_contact))
                            @php
                                $officeContacts = json_decode($sitesetting->office_contact, true);
                            @endphp
                            @if (is_array($officeContacts))
                                @foreach ($officeContacts as $contact)
                                    {{ $contact }} <br>
                                @endforeach
                            @else
                                <span>
                                    @if (app()->getLocale() == 'ne')
                                        {{ $sitesetting->office_contact_ne }}
                                    @else
                                        {{ $sitesetting->office_contact }}
                                    @endif
                                </span> <br>
                            @endif
                        @endif
                    </span>
                </div>
                <div class="info d-flex align-items-center col-6">
                    <i class="fa fa-home mt-1 mx-1"></i> 
                    <span>
                        @if (!empty($sitesetting->office_address))
                            @php
                                $officeAddresses = json_decode($sitesetting->office_address, true);
                            @endphp
                            @if (is_array($officeAddresses))
                                @foreach ($officeAddresses as $address)
                                    {{ $address }} <br>
                                @endforeach
                            @else
                                <span>
                                    @if (app()->getLocale() == 'ne')
                                        {{ $sitesetting->office_address_ne }}
                                    @else
                                        {{ $sitesetting->office_address }}
                                    @endif
                                </span> <br>
                            @endif
                        @endif
                    </span>
                </div>
            </div>
            
</section>


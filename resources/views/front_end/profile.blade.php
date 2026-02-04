<x-front-layout :menus="$menus">
  <div class="inner-banner">
    <img src="{{frontAsset('/assets/image/innerbanner.jpg')}}" alt="" width="100%" />
    <p class="inner-banner__text">
      {{ $faculty->salutation }} {{ $faculty->name }}
    </p>
  </div>

  <section
    class="faculty"
    style="background-image: url('{{ frontAsset('/assets/image/1167169_ORU2CC0.jpg') }}')"
  >
    <div class="container">
      <div class="main-profile">
        <h1 class="main-heading">Personal Information</h1>
        <div class="main-sectionss">
          <div class="image-profile">
            <img
              src="{{ $faculty->getFirstMediaUrl('faculty_profile') }}"
              alt="{{ $faculty->name }}"
            />
          </div>
          <div class="data-table">
            <table
              width="100%"
              align="center"
              cellpadding="3"
              cellspacing="0"
              border="0"
            >
              <!-- <tr> -->
              <tbody>
                <tr class="personal-profile">
                  <td bgcolor="transparent" align="left" valign="top">
                    <table
                      width="100%"
                      cellpadding="3"
                      cellspacing="3"
                      border="0"
                    >
                      <tbody>
                        <tr style="line-height: 30px">
                          <td align="left" valign="top" width="150">
                            <b>Name</b>
                          </td>
                          <td align="center" valign="top" width="21">
                            <strong>: </strong>
                          </td>
                          <td width="435" align="left" valign="top">
                           {{ $faculty->salutation }} {{ $faculty->name }}
                          </td>
                        </tr>
                        @if($faculty->designation )
                        <tr style="line-height: 30px">
                          <td align="left" valign="top"><b>Designation</b></td>
                          <td align="center" valign="top">
                            <strong>: </strong>
                          </td>
                          <td align="left" valign="top">
                            {{ $faculty->designation }}
                          </td>
                        </tr>
                        @endif @if($faculty->qualification )
                        <tr style="line-height: 30px">
                          <td align="left" valign="top">
                            <b>Qualification</b>
                          </td>
                          <td align="center" valign="top">
                            <strong>: </strong>
                          </td>
                          <td align="left" valign="top">
                            {{ $faculty->qualification }}
                          </td>
                        </tr>
                        @endif @if($faculty->email )
                        <tr style="line-height: 30px">
                          <td align="left" valign="top"><b>Email</b></td>
                          <td align="center" valign="top">
                            <strong>: </strong>
                          </td>
                          <td id="atag" align="left" valign="top">
                            {{ $faculty->email }}
                          </td>
                        </tr>
                        @endif @if($faculty->phone )
                        <tr style="line-height: 30px">
                          <td align="left" valign="top"><b>Phone No.</b></td>
                          <td align="center" valign="top">
                            <strong>: </strong>
                          </td>
                          <td align="left" valign="top">
                            {{ $faculty->phone }}
                          </td>
                        </tr>
                        @endif @if($faculty->area_of_specialization )
                        <tr style="line-height: 30px">
                          <td align="left" valign="top">
                            <b>Specialization  </b>
                          </td>
                          <td align="center" valign="top">
                            <strong>: </strong>
                          </td>
                          <td align="left" valign="top">
                            {{ $faculty->area_of_specialization }}
                          </td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @if($faculty->other_information)
      <div class="main-profile">
        <h1 class="main-heading">Other Information</h1>
        <p class="main-vsn">{!! $faculty->other_information !!}</p>
      </div>
    </div>
    @endif
  </section>
</x-front-layout>

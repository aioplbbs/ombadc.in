<x-front-layout :menus="$menus">

  <div class="inner-banner">
    <img src="{{frontAsset('/assets/image/innerbanner.jpg')}}" alt width="100%" />
    <p class="inner-banner__text"><a href="{{ route('home') }}">Home</a> <i
        class="fa-solid fa-angles-right"></i> {{(request()->segment(2) == "notice")?"Notice":"News & Events"}}</p>
  </div>

  <div class="container md-5">
    <div class="row d-flex justify-content-between mt-5"
      style="padding:0 40px;">
      <div class="col-md-12  mx-auto">
        <div class="content">
          <h1 class="main-heading">{{(request()->segment(2) == "notice")?"Notice":"News & Events"}}</h1>
          <p class="main-vsn">
          </p><table id="customers">
            <tbody>
              <tr>
                <th width="5%">SL No.</th>
                <th width="14%">Date of Publication</th>
                <th width="70%">Title</th>
                <th width="7%">Download</th>
              </tr>

              @php $count = 1; @endphp
              @foreach($notices as $notice)
              <tr>
                <td align="center" valign="top">{{$count++}}</td>
                <td align="center" valign="top">{{$notice['notice_publish']}}</td>
                <td align="left" valign="top">
                  {{$notice['notice_name']}}  @if($notice['notice_blink']=='Yes') <strong class="new">New</strong> @endif </td>
                <td align="center" valign="top"><a href="{{$notice['url']}}"   target="@if($notice['notice_open_in']=='New') _blank @endif"    >
                  @if($notice['notice_type'] == 'Link')
                    <i class="fa-solid fa-link"></i>
                
                @else
                <i class="fa-solid fa-file-pdf"></i>
                @endif
                </a></td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{$notices->links()}}

           

          </div>
        </div>
      </div>
    </div>

  </x-front-layout>

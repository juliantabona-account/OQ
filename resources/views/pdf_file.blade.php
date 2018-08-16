<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <style>
            .page-break {
                page-break-after: always;
            }
        </style>
        
    </head>

    <body>
        <div class="page" style="font-size: 7pt;">
            @if( !empty(Auth::user()->companyBranch->company->logo_url) )
                <img src="{{ Auth::user()->companyBranch->company->logo_url }}" style="width: auto;max-width:100px;max-height: 100px;float: right;">
            @endif    
            <table style="width: 100%;clear:  both;" class="header">
                <tbody>
                    <tr>
                        <td><h1 style="text-align: left">JOBCARD: #{{ $jobcard->id }}</h1></td>
                        <td>
                            <h4 style="text-align: right;">
                                Print Date: {{ date('d M Y') }}
                            </h4>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <table class="sa_signature_box" style="border-top: 1px solid black;padding: 1em 0 0 0; margin:0.5em 0 0 0;">
                <tbody>
                    <tr>    
                        <td><strong>Job Title:</strong></td>
                    </tr>
                    <tr>    
                        <td>{{ $jobcard->title ? $jobcard->title:'____' }}</td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>Job Description:</strong>
                        </td>
                    </tr>
                    <tr>    
                        <td>{{ $jobcard->description ? $jobcard->description:'____' }}</td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 100%; font-size: 8pt;">
                <tbody>
                    <tr>
                        <td>Category: <strong>{{ $jobcard->category ? $jobcard->category->name:'____' }}</strong></td>
                        <td>Cost Center: <strong>{{ $jobcard->costCenter ? $jobcard->costCenter->name:'____' }}</strong></td>
                    </tr>
                    <tr>
                        <td>Priority: <strong>{{ $jobcard->priority ? $jobcard->priority->name:'____' }}</strong></td>
                        <td>Status: <strong>......</strong></td>
                    </tr>
            
                    <tr>
                        <td>Branch: <strong>{{ $jobcard->owningBranch ? $jobcard->owningBranch->destination:'____' }}</strong></td>
                    </tr>
                    <tr>
                        <td>Start Date: <strong>{{ $jobcard->start_date ? Carbon\Carbon::parse($jobcard->start_date)->format('d M Y'):'____' }}</strong></td>
                        <td>End Date: <strong>{{ $jobcard->end_date ? Carbon\Carbon::parse($jobcard->end_date)->format('d M Y'):'____' }}</strong></td>
                    </tr>
                </tbody>
            </table>
            @if($jobcard->client)
                <table style="width: 100%; border-top: 1px solid black; font-size: 8pt;padding: 1.5em 0 1em 0;margin:0.5em 0 0;">
                    <tbody> 
                        <tr>
                            <td><strong>CLIENT DETAILS</strong></td>
                            <td>Client: <strong>{{ $jobcard->client->name ? $jobcard->client->name:'' }}</strong></td>
                            <td>Email: <strong>{{ $jobcard->client->email ? $jobcard->client->email:'' }}</strong></td>
                            <td>Phone:
                                <strong>
                                    {{ $jobcard->client->phone_ext ? '+'.$jobcard->client->phone_ext.'-':'' }}
                                    {{ $jobcard->client->phone_num ? $jobcard->client->phone_num:'' }}
                                </strong>
                            </td>                        
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; font-size: 8pt;">
                    <tbody> 
                        @if(COUNT($jobcard->client->contacts))
                            <tr>
                                <td>Other Contacts:</td>
                            </tr>
                            <tr>
                                <td style="width:100% !important;">
                                @foreach($jobcard->client->contacts as $key => $contact)  
                                    @if($contact->phone_num)
                                        <strong>
                                            {{ $contact->first_name ? $contact->first_name:'' }}
                                            {{ $contact->position ? '['.$contact->position.']':'' }}
                                            {{ $contact->phone_ext ? '+('.$contact->phone_ext.') ':'' }} 
                                            {{ $contact->phone_num ? $contact->phone_num:'' }}
                                            {{ 
                                                ( COUNT($jobcard->client->contacts) > 1) && 
                                                ( $key < (COUNT($jobcard->client->contacts) - 1) )  
                                                    ? ',':'' 
                                            }}
                                        </strong>
                                    @endif
                                @endforeach
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            @endif
            @if($jobcard->selectedContractor)
                <table style="width: 100%; border-top: 1px solid black; font-size: 8pt;padding: 1.5em 0 0.5em 0;margin:0.5em 0 0;">
                    <tbody> 
                        <tr style="padding: 0.5em 0 0 0;">
                            <td><strong>CONTRACTOR DETAILS</strong></td>
                            <td>Contractor: <strong>{{ $jobcard->selectedContractor->name ? $jobcard->selectedContractor->name:'____' }}</strong></td>
                            <td>Email:<strong>{{ $jobcard->selectedContractor->email ? $jobcard->selectedContractor->email:'____' }}</strong></td>
                            <td>Phone:
                                <strong>
                                    {{ $jobcard->selectedContractor->phone_ext ? '+'.$jobcard->selectedContractor->phone_ext.'-':'___-' }}
                                    {{ $jobcard->selectedContractor->phone_num ? $jobcard->selectedContractor->phone_num:'____' }}
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; font-size: 8pt;">
                    <tbody> 
                        @if(COUNT($jobcard->selectedContractor->contacts))
                            <tr>
                                <td>Other Contacts:</td>
                            </tr>
                            <tr>
                                <td style="width:100% !important;">
                                @foreach($jobcard->selectedContractor->contacts as $key => $contact)  
                                    @if($contact->phone_num)
                                        <strong>
                                            {{ $contact->first_name ? $contact->first_name:'' }}
                                            {{ $contact->position ? '['.$contact->position.']':'' }}
                                            {{ $contact->phone_ext ? '+('.$contact->phone_ext.') ':'' }} 
                                            {{ $contact->phone_num ? $contact->phone_num:'' }}
                                            {{ 
                                                ( COUNT($jobcard->client->contacts) > 1) && 
                                                ( $key < (COUNT($jobcard->client->contacts) - 1) )  
                                                    ? ',':'' 
                                            }}
                                        </strong>
                                    @endif
                                @endforeach
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            @endif
            <br/>
            <table style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 8pt;margin-bottom:0.5em;">
                <tbody> 
                    <tr>
                        <td>Created By: <strong>{{ $jobcard->createdBy->first_name.' '.$jobcard->createdBy->last_name }}</strong></td>
                        <td>Created On: <strong>{{ $jobcard->created_at ? Carbon\Carbon::parse($jobcard->created_at)->format('d M Y'):'____' }}</strong></td>
                        <td>Authorized By: <strong>......</strong></td>
                        <td>Authorized Date: <strong>......</strong></td>
                    </tr>
                </tbody>
            </table>
            
            <table>
                <tbody>
                    <tr>
                        <td colspan="6">
                            <h2>Assets: </h2>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <th>Asset Code</th>
                        <th>Asset Name</th>
                        <th>Quantity</th>
                    </tr>
                    <tr class="even_row">
                        <td style="text-align: center">64</td>
                        <td>Filter Net</td>
                        <td style="text-align: center">5</td>
                    </tr>
            
                    <tr class="odd_row">
                        <td style="text-align: center">79</td>
                        <td>Insulation Tube</td>
                        <td style="text-align: center">3</td>
                    </tr>
            
                    <tr class="even_row">
                        <td style="text-align: center">83</td>
                        <td>Aircon Oil Filters</td>
                        <td style="text-align: center">3</td>                    
                    </tr>
                </tbody>
            </table>

            <div class="page-break"></div>
            
            @if( !empty(Auth::user()->companyBranch->company->logo_url) )
                <img src="{{ Auth::user()->companyBranch->company->logo_url }}" style="width: auto;max-width:100px;max-height: 100px;float: right;">
            @endif     
            <table style="width: 100%;clear:  both;" class="header">
                <tbody>
                    <tr>
                        <td><h1 style="text-align: left">Inspection Signoff</h1></td>
                        <td>
                            <h4 style="text-align: right;">
                                Print Date: {{ date('d M Y') }}
                            </h4>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 0 10px 20px;margin-top: 15px;border-top: 1px solid black;background: #f1f1f1;"><h3 style="padding-top: 2em;">
                FOR CLIENT: </h3>
                <p><strong>NOTE: </strong>
                To be signed only upon satisfactory completion of job(s) in job description</p>
                <table style="width: 100%;font-size: 8pt;margin:1em 0 0.5em 0;">
                    <tbody>   
                        <tr>
                            <td>FULL NAME: <strong>_____________________________</strong></td>
                            <td>DATE: <strong>___________________</strong></td>
                            <td>SIGNATURE<strong>___________________</strong></td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;font-size: 8pt;margin:1em 0 0.5em 0;">
                    <tbody> 
                        <tr>
                            <td>Notes: _____________________________________________________________________________________________________________________</td>
                        </tr>
                        <tr>
                            <td>___________________________________________________________________________________________________________________________</td>            
                        </tr>
                        <tr>
                            <td>___________________________________________________________________________________________________________________________</td>            
                        </tr>
                    </tbody>
                </table>
                <h3 style="padding-top: 1em;">FOR CONTRACTOR: </h3>
                <p>
                    <strong>NOTE: </strong>
                    Please state the number of employees engaged for work(s) described above
                </p>
                <table style="width: 100%;font-size: 8pt;margin:1em 0 0.5em 0;">
                    <tbody>                 
                        <tr>
                            <td>NO. Of Employees: <strong>___________________________</strong></td>    
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;font-size: 8pt;margin:1em 0 0.5em 0;">
                    <tbody>        
                        <tr>
                            <td>FULL NAME: <strong>_____________________________</strong></td>
                            <td>DATE: <strong>___________________</strong></td>
                            <td>SIGNATURE<strong>___________________</strong></td>    
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;font-size: 8pt;margin:1em 0 0.5em 0;">
                    <tbody> 
                        <tr>
                            <td>Notes: _____________________________________________________________________________________________________________________</td>
                        </tr>
                        <tr>
                            <td>___________________________________________________________________________________________________________________________</td>            
                        </tr>
                        <tr>
                            <td>___________________________________________________________________________________________________________________________</td>            
                        </tr>
                    </tbody>
                </table>
                <h3 style="padding-top: 1em;">FOR INSPECTOR: </h3>
                <p><strong>NOTE: </strong>To be signed only upon satisfactory completion of job(s) in job description</p>
                <table style="width: 100%;font-size: 8pt;margin:1em 0 0.5em 0;">
                    <tbody>
                        <tr>
                            <td>FULL NAME: <strong>_____________________________</strong></td>
                            <td>DATE: <strong>___________________</strong></td>
                            <td>SIGNATURE<strong>___________________</strong></td>    
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;font-size: 8pt;margin:1em 0 0.5em 0;">
                    <tbody> 
                        <tr>
                            <td>Notes: _____________________________________________________________________________________________________________________</td>
                        </tr>
                        <tr>
                            <td>___________________________________________________________________________________________________________________________</td>            
                        </tr>
                        <tr>
                            <td>___________________________________________________________________________________________________________________________</td>            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
<ul class="imenu">  
@foreach($data as $row) 
  <li>
    <a title="{{ $row['jobRoleName'] }}" jobRoleId="{{ $row['id'] }}"  onclick="showJobRoleSkillForm(this,{{ $row['id'] }})" href="#">
    @if($row['languageCount'] > 0 && $row['skillCount'] > 0 && $row['specializationCount'] > 0 )
      <i class="fa fa-check pull-right green-text m_t10 greenRight{{ $row['id'] }}" style="display: block" ></i> 
    @else
      <i class="fa fa-check pull-right green-text m_t10 greenRight{{ $row['id'] }}" style="display: none" ></i> 
    @endif
    
     <strong class="normal">{{ $row['jobRoleName'] }}</strong> ({{ $row['jobRoleGradeName'] }})
      <br>
     <span class="light_gray_color font_12">  {{ $row['subDepartmentName'] }}({{ $row['unitName'] }})</span>
    
    </a>
  </li>
@endforeach
</ul>
       


 
<div style='display:flex;justify-content: center;' >	
 <ul class='pagination'>
    

    @if($page==0) <li class='disabled'>
    @else <li class='waves-effect'>
    @endif

    <a 
    @if($page!=0) href='/$page'
    @endif 
    ><i class='material-icons'>chevron_left</i></a></li>
 	


 	 @for ($i=1; $i <= $page_count; $i++)


 	 @if ($i==1 || $i==$page_count || (($i<=$page+1) && ($i>=$page-5)) || (($i>=$page+1) && ($i<=$page+6)))	
   <li 
      @if ($page+1==$i) class='active'
      @else class='waves-effect'
      @endif
   ><a href='/{{ $i }}'>{{ $i }}</a></li>
 
		
		@elseif($i<$page && $flag_left)
		
			<li class='waves-effect'><a>...</a></li>
		{{ $flag_left=!$flag_left }}
		@elseif($i>$page && $flag_right)
		
			<li class='waves-effect'><a>...</a></li>
    {{ $flag_right=!$flag_right }}
		
    @endif


	 @endfor
    
    <li 
    @if($page+1==$page_count) class='disabled'
    @else class='waves-effect'
    @endif
    ><a 
    @if($page+1!=$page_count) 
     href='/{{ $page+2}}'
     @endif
     ><i class='material-icons'>chevron_right</i></a></li>
  </ul>
</div>
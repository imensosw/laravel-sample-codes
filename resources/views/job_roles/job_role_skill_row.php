 <tr id="duplicate<?php echo $skill['skillId'];?>">
     <td><?php echo $skill['skillName'];?>
         <input type="hidden" name="skills[]" value="<?php echo $skill['skillId'];?>" >
     </td>
     <?php
     foreach ($comepetencyLevels as $comepetencyLevel) 
     {  
     ?>
     <td class="text-center">
        <div class="inline_block1">
            <input type="radio" id="skill<?php echo $skill['skillId']; ?><?php echo $comepetencyLevel['id']; ?>" name="skill<?php echo $skill['skillId'];?>" value="<?php echo $comepetencyLevel['id']; ?>">
            <label for="skill<?php echo $skill['skillId'];?><?php echo $comepetencyLevel['id']; ?>"> </label>
        </div>
    </td>
    <?php 
    } 
    ?>
    <td class="text-center"><button type="button" class="close removeSpecialization1 remove_skill" title="Remove"> <img src="images/icons/close.svg" class="svg"> </button></td>
</tr> 
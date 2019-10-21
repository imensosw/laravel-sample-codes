 <tr id="duplicateLanguage<?php echo $skill['skillId'];?>">
                        <td>
                            <?php echo $skill['skillName'];?>
                            <input type="hidden" name="language[]" id="language<?php echo $skill['skillId'];?>" value="<?php echo $skill['skillId'];?>" >
                        </td>
                        <td class="text-center">
                            <div class="inline_block1">
                                <input type="checkbox" name="lanngRead<?php echo $skill['skillId'];?>"  id="lanngRead<?php echo $skill['skillId'];?>" value="1" >
                                <label for="lanngRead<?php echo $skill['skillId'];?>"> </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="inline_block1">
                                <input type="checkbox" name="lanngWrite<?php echo $skill['skillId'];?>" id="lanngWrite<?php echo $skill['skillId'];?>"  value="1">
                                <label for="lanngWrite<?php echo $skill['skillId'];?>"> </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="inline_block1">
                                <input type="checkbox" name="lanngSpeak<?php echo $skill['skillId'];?>" id="lanngSpeak<?php echo $skill['skillId'];?>" value="1">
                                <label for="lanngSpeak<?php echo $skill['skillId'];?>"> </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="inline_block1">
                                <input type="checkbox" name="lanngUnderstand<?php echo $skill['skillId'];?>" id="lanngUnderstand<?php echo $skill['skillId'];?>" value="1" >
                                <label for="lanngUnderstand<?php echo $skill['skillId'];?>"> </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <button title="Remove" class="close remove_language" type="button"> <img class="svg" src="images/icons/close.svg"> </button>
                        </td>
                    </tr>
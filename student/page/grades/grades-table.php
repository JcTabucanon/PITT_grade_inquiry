
      <tbody class="bg-white divide-y divide-gray-200">
        <?php if (!isset($_GET['semester'])) : ?>
          <tr>
            <td colspan="7" class="text-center">Select Year Level First</td>
          </tr>
        <?php else: ?>
          <?php $selected_semester = ucfirst($_GET['semester']); ?>
          <?php foreach ($result as $data) : ?>
            <?php if ($_GET['semester'] === 'all' || $_GET['semester'] === strtolower($data['SEMESTER'])) : ?>
              <?php if ($_GET['YLEVEL'] === $data['YLEVEL']) : ?>
                <tr class="group">
                  <td class="flex td">
                    <div class="flex items-center">
                      <strong><?= $data['COURSE_CODE']; ?></strong>
                    </div>
                  </td>
                  <td class="td">
                    <div class="flex items-center">
                      <?= $data['DESCRIPTIVE_TITLE']; ?>
                    </div>
                  </td>
                  <td><?= $data['SEMESTER']; ?></td>
                  <td class="td" >
                    <div class="flex items-center">
                      <?= $data['MID_TERM']; ?>
                    </div>
                  </td>
                  <td class="td">
                    <div class="flex items-center">
                      <?= $data['FINAL_TERM']; ?>
                    </div>
                  </td>
                  <td class="td">
                    <div class="flex items-center">
                      <?= $data['GEN_AVE']; ?>
                    </div>
                  </td>
                  <td class="<?php
                    $avg = $data['GEN_AVE'];
                    ?>">
                    <?php
                    if ($avg >= 1.0 && $avg <= 3.2) {
                      echo "Passed";
                    } else if ($avg >= 3.3 && $avg <= 4.2) {
                      echo "Conditional";
                    } else if ($avg >= 4.3 && $avg <= 5.0) {
                      echo "Failed";
                    }
                    ?>
                  </td>
                </tr>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
 
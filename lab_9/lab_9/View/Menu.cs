using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using lab_9.Controller;
using lab_9.Model;
using lab_9.Utils;

namespace lab_9.View
{
    public partial class Menu : Form, IObserverHarmoic, IObserverHarmonicContainer
    {
        private IHarmonicContainerView _harmonicContainerView;
        private IMenuController _menuController;
        private HarmonicContainerReprezentation _harmonicContainerVizualization;

        public object Validator { get; private set; }

        public Menu(IHarmonicContainerView harmonicContainerView, IMenuController menuController)
        {
            InitializeComponent();
            _menuController = menuController;
            _harmonicContainerView = harmonicContainerView;
            _harmonicContainerVizualization = new HarmonicContainerReprezentation(_harmonicContainerView, tabPage1, dataGridView1);
        }

        private void button2_Click(object sender, EventArgs e)
        {

        }

        private void radioButton1_CheckedChanged(object sender, EventArgs e)
        {

        }

        private void harmonics_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        public void PropertyChanges()
        {
            _harmonicContainerVizualization.Update();
            if (harmonics.SelectedIndex != -1)
            {
                UpdateStringPresentation(harmonics.SelectedIndex);
            }
            else
            {
                ResetHarmonicPropertiesView();
            }
        }

        public void RemovedHarmonic(int index)
        {
            harmonics.Items.RemoveAt(index);
            ResetHarmonicPropertiesView();
            _harmonicContainerVizualization.Update();
        }

        public void AddedHarmonic(int index)
        {
            harmonics.Items.Add(Util.HarmonicToStr(_harmonicContainerView.GetViews()[index]));
            _harmonicContainerVizualization.AddNewHarmonic(index);
        }

        private void UpdateStringPresentation(int harmonicIndex)
        {
            harmonics.Items[harmonicIndex] = Util.HarmonicToStr(_harmonicContainerView.GetViews()[harmonicIndex]);
        }

        private void SetHarmonicPropertiesToView(IHarmonicView harmonic)
        {
            textBox1.Text = harmonic.GetAmplitude().ToString();
            textBox2.Text = harmonic.GetFrequency().ToString();
            textBox3.Text = harmonic.GetPhase().ToString();
            radioButton1.Checked = harmonic.GetHarmonicType() == HarmonicType.Sin ? true : false;
            radioButton2.Checked = harmonic.GetHarmonicType() == HarmonicType.Cos ? true : false;
        }

        private void ResetHarmonicPropertiesView()
        {
            textBox1.Text = "";
            textBox2.Text = "";
            textBox3.Text = "";
            radioButton1.Checked = false;
            radioButton2.Checked = false;
            EnableInputMethods(false);
        }

        private void EnableInputMethods(bool value)
        {
            textBox1.Enabled = value;
            textBox2.Enabled = value;
            textBox3.Enabled = value;
            radioButton1.Enabled = value;
            radioButton2.Enabled = value;
            button2.Enabled = value;
        }

        private void SinRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            if (!radioButton1.Focused || harmonics.SelectedIndex == -1)
            {
                return;
            }
            _menuController.SetHarmonicType(harmonics.SelectedIndex, HarmonicType.Sin);
        }

        private void CosRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            if (!radioButton2.Focused || harmonics.SelectedIndex == -1)
            {
                return;
            }
            _menuController.SetHarmonicType(harmonics.SelectedIndex, HarmonicType.Cos);
        }

        private void HarmonicList_SelectedIndexClicked(object sender, EventArgs e)
        {
            if (harmonics.SelectedIndex >= 0)
            {
                EnableInputMethods(true);
                var harmonicPresentation = _harmonicContainerView.GetViews()[harmonics.SelectedIndex];
                SetHarmonicPropertiesToView(harmonicPresentation);
            }
        }

        private void AmplitudeTextBox_TextChanged(object sender, EventArgs e)
        {
            if (!CanProcessTextBoxStringValue(textBox1))
            {
                return;
            }
            var amplitudeValue = Util.ProcessStringValue(textBox1.Text);
            if (amplitudeValue != null)
            {
                errorProvider1.Clear();
                _menuController.SetAmplitude(harmonics.SelectedIndex, amplitudeValue.Value);
            }
            else
            {
                errorProvider1.SetError(textBox1, "Cannot use letters");
            }
        }

        private void FrequencyTextBox_TextChanged(object sender, EventArgs e)
        {
            if (!CanProcessTextBoxStringValue(textBox2))
            {
                return;
            }
            var frequencyValue = Util.ProcessStringValue(textBox2.Text);
            if (frequencyValue != null)
            {
                errorProvider2.Clear();
                _menuController.SetFrequency(harmonics.SelectedIndex, frequencyValue.Value);
            }
            else
            {
                errorProvider2.SetError(textBox2, "Cannot use letters");
            }
        }

        private void PhaseTextBox_TextChanged(object sender, EventArgs e)
        {
            if (!CanProcessTextBoxStringValue(textBox3))
            {
                return;
            }
            var phaseValue = Util.ProcessStringValue(textBox3.Text);
            if (phaseValue != null)
            {
                errorProvider3.Clear();
                _menuController.SetPhase(harmonics.SelectedIndex, phaseValue.Value);
            }
            else
            {
                errorProvider3.SetError(textBox3, "Cannot use letters");
            }
        }

        private bool CanProcessTextBoxStringValue(TextBox textBox)
        {
            return textBox.Focused && !string.IsNullOrEmpty(textBox.Text) && harmonics.SelectedIndex != -1;
        }

        private void DeleteHarmonicButton_Click(object sender, EventArgs e)
        {
            if (harmonics.SelectedIndex != -1)
            {
                _menuController.DeleteHarmonic(harmonics.SelectedIndex);
            }
        }

        private void AddNewHarmonicButton_Click(object sender, EventArgs e)
        {
            _menuController.StartAddingHarmonic();
        }

        private void MainMenu_Load(object sender, EventArgs e)
        {
            _harmonicContainerVizualization.Update();
            EnableInputMethods(false);
        }

        private void HarmonicList_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (harmonics.Items.Count == 0)
            {
                EnableInputMethods(false);
            }
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void tabPage2_Click(object sender, EventArgs e)
        {

        }

        private void Menu_Load(object sender, EventArgs e)
        {

        }
    }
}

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
    public partial class AddingHarmonicView : Form, IObserverHarmoic
    {
        private IAddingController _addingHarmonicController;
        private IHarmonicView _harmonicPresentation;

        public AddingHarmonicView(IHarmonicView harmonicPresentation, IAddingController addingNewHarmonicController)
        {
            InitializeComponent();
            _addingHarmonicController = addingNewHarmonicController;
            _harmonicPresentation = harmonicPresentation;
            FillPropertiesDefaultValue(_harmonicPresentation);
            PropertyChanges();
        }
               
        private void FillPropertiesDefaultValue(IHarmonicView harmonicPresentation)
        {
            textBox1.Text = harmonicPresentation.GetAmplitude().ToString();
            textBox2.Text = harmonicPresentation.GetFrequency().ToString();
            textBox3.Text = harmonicPresentation.GetPhase().ToString();
            if (harmonicPresentation.GetHarmonicType() == HarmonicType.Sin)
            {
                radioButton1.Checked = true;
            }
            else
            {
                radioButton2.Checked = true;
            }
        }

        private void CreateHarmonic_Click(object sender, EventArgs e)
        {
            _addingHarmonicController.AddHarmonic();
        }

        private void CancelButton_Click(object sender, EventArgs e)
        {
            _addingHarmonicController.Exit();
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
                _addingHarmonicController.SetAmplitude(amplitudeValue.Value);
            }
            else
            {
                errorProvider1.SetError(textBox1, "Cannot use letters");
            }
        }

        private void SinRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            if (!radioButton1.Focused)
            {
                return;
            }
            _addingHarmonicController.SetHarmonicType(HarmonicType.Sin);
        }

        private void CosRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            if (!radioButton2.Focused)
            {
                return;
            }
            _addingHarmonicController.SetHarmonicType(HarmonicType.Cos);
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
                _addingHarmonicController.SetFrequency(frequencyValue.Value);
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
                _addingHarmonicController.SetPhase(phaseValue.Value);
            }
            else
            {
                errorProvider3.SetError(textBox3, "Cannot use letters");
            }
        }

        private static bool CanProcessTextBoxStringValue(TextBox textBox)
        {
            return textBox.Focused && !string.IsNullOrEmpty(textBox.Text);
        }

        public void PropertyChanges()
        {
            textBox1.Text = Util.HarmonicToStr(_harmonicPresentation);
        }
    }
}

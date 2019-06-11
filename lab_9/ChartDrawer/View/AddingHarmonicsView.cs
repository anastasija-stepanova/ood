using lab9.Controller;
using lab9.Model;
using lab9.Util;
using System;
using System.Windows.Forms;

namespace lab9.View.AddingHarmonic
{
    public partial class AddingHarmonicsView : Form, IObserverHarmoic
    {
        private IAddingController _addingHarmonicController;
        private IHarmonicView _harmonicPresentation;

        public AddingHarmonicsView( IHarmonicView harmonicPresentation, IAddingController addingNewHarmonicController )
        {
            InitializeComponent();
            _addingHarmonicController = addingNewHarmonicController;
            _harmonicPresentation = harmonicPresentation;
            FillPropertiesDefaultValue( _harmonicPresentation );
            HarmonicPropertiesChanged();
        }

        private void FillPropertiesDefaultValue( IHarmonicView harmonicPresentation )
        {
            amplitudeTextBox.Text = harmonicPresentation.GetAmplitude().ToString();
            frequencyTextBox.Text = harmonicPresentation.GetFrequency().ToString();
            phaseTextBox.Text = harmonicPresentation.GetPhase().ToString();
            if (harmonicPresentation.GetHarmonicKind() == HarmonicType.Sin)
            {
                sinRadioButton.Checked = true;
            }
            else
            {
                cosRadioButton.Checked = true;
            }
        }

        private void CreateHarmonic_Click( object sender, EventArgs e )
        {
            _addingHarmonicController.AddNewHarmonic();
        }

        private void CancelButton_Click( object sender, EventArgs e )
        {
            _addingHarmonicController.Cancel();
        }

        public void HarmonicPropertiesChanged()
        {
            harmonicStringPresentation.Text = Utils.ConvertHarmonicToStr( _harmonicPresentation );
        }

        private void AmplitudeTextBox_TextChanged( object sender, EventArgs e )
        {
            if ( !CanProcessTextBoxStringValue(amplitudeTextBox))
            {
                return;
            }
            var amplitudeValue = Utils.ProcessTextBoxStringValue( amplitudeTextBox.Text );
            if ( amplitudeValue != null )
            {
                amplitudeErrorProvider.Clear();
                _addingHarmonicController.SetAmplitude( amplitudeValue.Value );
            }
            else
            {
                amplitudeErrorProvider.SetError( amplitudeTextBox, "Cannot use letters");
            }
        }

        private void SinRadioButton_CheckedChanged( object sender, EventArgs e )
        {
            if (!sinRadioButton.Focused)
            {
                return;
            }
            _addingHarmonicController.SetHarmonicKind( HarmonicType.Sin );
        }

        private void CosRadioButton_CheckedChanged( object sender, EventArgs e )
        {
            if (!cosRadioButton.Focused)
            {
                return;
            }
            _addingHarmonicController.SetHarmonicKind( HarmonicType.Cos );
        }

        private void FrequencyTextBox_TextChanged( object sender, EventArgs e )
        {
            if ( !CanProcessTextBoxStringValue( frequencyTextBox ) )
            {
                return;
            }
            var frequencyValue = Utils.ProcessTextBoxStringValue( frequencyTextBox.Text );
            if ( frequencyValue != null )
            {
                frequencyErrorProvider.Clear();
                _addingHarmonicController.SetFrequency( frequencyValue.Value );
            }
            else
            {
                frequencyErrorProvider.SetError( frequencyTextBox, "Cannot use letters");
            }
        }

        private void PhaseTextBox_TextChanged( object sender, EventArgs e )
        {
            if ( !CanProcessTextBoxStringValue(phaseTextBox) )
            {
                return;
            }
            var phaseValue = Utils.ProcessTextBoxStringValue( phaseTextBox.Text );
            if (phaseValue != null)
            {
                phaseErrorProvider.Clear();
                _addingHarmonicController.SetPhase( phaseValue.Value );
            }
            else
            {
                phaseErrorProvider.SetError( phaseTextBox, "Cannot use letters");
            }
        }

        private static bool CanProcessTextBoxStringValue( TextBox textBox )
        {
            return textBox.Focused && !string.IsNullOrEmpty( textBox.Text );
        }

        private void addingNewHarmonicBox_Enter(object sender, EventArgs e)
        {

        }
    }
}

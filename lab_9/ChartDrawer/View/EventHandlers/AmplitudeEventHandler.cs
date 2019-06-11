using lab9.Controller;
using lab9.Util;
using System;
using System.Windows.Forms;

namespace lab9.View.MainMenu.EventHandlers
{
    public class AmplitudeEventHandler
    {
        private TextBox _amplitudeTextBox;
        private ErrorProvider _amplitudeErrorProvider;
        private IMenuController _mainMenuController;
        private ListBox _harmonicList;

        public AmplitudeEventHandler( IMenuController mainMenuController, ListBox harmonicList, ErrorProvider errorProvider ,TextBox amplitudeTextBox )
        {
            _mainMenuController = mainMenuController;
            _amplitudeTextBox = amplitudeTextBox;
            _amplitudeErrorProvider = errorProvider;
            _harmonicList = harmonicList;
            _amplitudeTextBox.TextChanged += new EventHandler( AmplitudeTextBox_TextChanged );
        }

        private void AmplitudeTextBox_TextChanged( object sender, EventArgs e )
        {
            if ( !Utils.CanProcessTextBoxStringValue( _amplitudeTextBox, _harmonicList.SelectedIndex ) )
            {
                return;
            }
            var amplitudeValue = Utils.ProcessTextBoxStringValue( _amplitudeTextBox.Text );
            if ( amplitudeValue != null )
            {
                _amplitudeErrorProvider.Clear();
                _mainMenuController.SetNewAmplitude( _harmonicList.SelectedIndex, amplitudeValue.Value );
            }
            else
            {
                _amplitudeErrorProvider.SetError( _amplitudeTextBox, "Cannot use letters");
            }
        }
    }
}

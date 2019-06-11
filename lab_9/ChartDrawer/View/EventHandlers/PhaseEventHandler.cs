using lab9.Controller;
using lab9.Util;
using System;
using System.Windows.Forms;

namespace lab9.View.MainMenu.EventHandlers
{
    public class PhaseEventHandler
    {
        private TextBox _phaseTextBox;
        private ErrorProvider _phaseErrorProvider;
        private IMenuController _mainMenuController;
        private ListBox _harmonicList;

        public PhaseEventHandler( IMenuController mainMenuController, ListBox harmonicList, ErrorProvider errorProvider, TextBox phaseyTextBox )
        {
            _mainMenuController = mainMenuController;
            _phaseTextBox =phaseyTextBox;
            _phaseErrorProvider = errorProvider;
            _harmonicList = harmonicList;
            _phaseTextBox.TextChanged += new EventHandler( PhaseTextBox_TextChanged );
        }

        private void PhaseTextBox_TextChanged( object sender, EventArgs e )
        {
            if ( !Utils.CanProcessTextBoxStringValue( _phaseTextBox, _harmonicList.SelectedIndex ) )
            {
                return;
            }
            var phaseValue = Utils.ProcessTextBoxStringValue( _phaseTextBox.Text );
            if ( phaseValue != null )
            {
                _phaseErrorProvider.Clear();
                _mainMenuController.SetNewPhase( _harmonicList.SelectedIndex, phaseValue.Value );
            }
            else
            {
                _phaseErrorProvider.SetError( _phaseTextBox, "Cannot use letters");
            }
        }

    }
}

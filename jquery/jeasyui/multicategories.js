// Скрипт реализующий фунционал для jeasyui tree() товары из подкатегорий автоматически размещались/убирались в основной категории
// Документация https://www.jeasyui.com/documentation/tree.phphttps://www.jeasyui.com/documentation/tree.php
var mcHelper = {};
(function ($) {
    mcHelper = {
        init: function () {
            $('#multiCategoriesTree').tree({
                url:mcConfig._xtAjaxUrl,
                cascadeCheck: false,
                queryParams: {
                    'rid':mcConfig.rid
                },
                checkbox: function(node) {
                    var parent_ = mcHelper.getParent();
                    if (node.id == parent_) {
                        return false;
                    }
                    return true;
                },
                onBeforeSelect: function() {
                    return false;
                },
                onCheck:function(node, checked) {
                    var save = [];
                    var parent_ = mcHelper.getParent();
                    if (node.id == parent_) {
                        return false;
                    }
                    var parent = $(this).tree('getParent', node.target);
                    var checkedItems, checkedItems2;
                    checkedItems = $(this).tree('getChecked');
                    var parentCheckedCount;
                    if (parent){
                        parentParent = $(this).tree('getParent', parent.target);
                        if(parentParent){
                            flag = false;
                            parentCheckedCount = 0;
                            if (checkedItems.length) {
                                $.each(checkedItems, function(index, value){
                                    if (value.parent === parent.id)
                                        parentCheckedCount++;
                                });
                            }
                            if (parentCheckedCount !== 0){
                                $(this).tree('check', parentParent.target);
                            }
                            if (parentCheckedCount === 0){
                                $(this).tree('uncheck', parentParent.target);
                            }
                        }
                    } 
                    checkedItems2 = $(this).tree('getChecked');
                    if (checkedItems2.length) {
                        $.each(checkedItems2, function(index, value){
                            save.push(value.id);
                        });
                    }
                    $('input[name="__multicategories"]').val(save.join());
                },
                onLoadError:function(xhr) {
                    if (xhr.status != 200) {
                        $.messager.alert(_mcLang['error'], _mcLang['server_error'] + xhr.status + ' ' + xhr.statusText, 'error');
                    }
                }
            });
        },
        getParent: function() {
            return $('input[name="parent"]').val();
        }
    }
})(jQuery);
